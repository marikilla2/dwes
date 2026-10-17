<?php
function e(string $texto) {
    return htmlspecialchars((string)$texto, ENT_QUOTES, 'UTF-8');
}

$mensajeError = null;
$edadInt = null;
$edadStringOriginal = null;
$procesado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $procesado = true;
    
    $entradaRaw = $_POST['edad'] ?? '';
    $edadStringOriginal = trim($entradaRaw);

    if (!ctype_digit($edadStringOriginal)) {
        $mensajeError = "La edad debe ser un número entero válido formado solo por dígitos.";
    } else {
        $valorTemp = (int) $edadStringOriginal;

        if ($valorTemp < 0 || $valorTemp > 120) {
            $mensajeError = "La edad debe estar comprendida entre 0 y 120 años.";
        } else {
            $edadInt = $valorTemp;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validación de Edad y Conversión de Tipos</title>
</head>
<body>

    <h2>Formulario de Registro de Edad</h2>

    <form action="" method="post">
        <label for="edad">Introduce tu edad:</label>
        <input type="text" id="edad" name="edad" value="<?= $procesado ? e($edadStringOriginal) : '' ?>">
        <button type="submit">Enviar</button>
    </form>

    <?php if ($procesado) {?>
        <hr>
        <h3>Resultado del Procesamiento</h3>

        <?php if ($mensajeError !== null) { ?>
            <p><strong>Error:</strong> <?= e($mensajeError) ?></p>
        <?php } else { ?>
            <p><strong>Edad válida registrada: </strong> <?= e($edadInt) ?> años</p>
            
            <h4>Comprobación de tipos con var_dump():</h4>
            <pre>
            Dato recibido ($_POST['edad'] tras trim):
            <?php var_dump($edadStringOriginal); ?>

            Dato convertido a entero ((int)):
            <?php var_dump($edadInt); ?>
            </pre>
        <?php } ?>
    <?php }  ?>

    <hr>

    <h2>Conversiones de Tipo (Type Casting)</h2>
    <p>A continuación se evalúa el comportamiento de PHP al forzar la conversión de diferentes tipos de datos mediante <code>var_dump()</code>:</p>

    <pre>
        Convertir 'hola' a int -> (int) 'hola':
        <?php var_dump((int) 'hola'); ?>

        Convertir 12.9 a int -> (int) 12.9:
        <?php var_dump((int) 12.9); ?>

        Convertir '12.5' a float -> (float) '12.5':
        <?php var_dump((float) '12.5'); ?>

        Convertir 20 a string -> (string) 20:
        <?php var_dump((string) 20); ?>
    </pre>

    <h3>¿Por qué convertir (casting) no sustituye a validar?</h3>
    <p>
        Convertir un tipo de dato simplemente le fuerza a PHP adaptar un valor a un tipo determinado siguiendo unas reglas fijas, sin importar si el valor original tenía sentido o no.
    </p>
    <p>
        Por ejemplo, al convertir la cadena <code>'hola'</code> a entero mediante <code>(int)'hola'</code>, PHP devuelve el número <code>0</code> sin lanzar ningún tipo de error. Si confiáramos en el "casting" como método de validación, consideraríamos que el usuario ingresó un valor numérico válido (el cero), aceptando datos basura. Del mismo modo, forzar <code>150</code> a entero no impide que sobrepase el límite biológico de una edad (120 años).
    </p>
    <p>
        <strong>Validar</strong> implica verificar que la entrada cumple con el formato, tipo y rango esperados antes de procesarla. La conversión solo debe hacerse sobre datos previamente validados.
    </p>

    <hr>

    <h2>Documentación Oficial</h2>
    <p>
        La función <a href="https://www.php.net/manual/es/function.ctype-digit.php" target="_blank" rel="noopener noreferrer"><code>ctype_digit()</code></a> recibe una cadena de texto (<code>string</code>) o una variable que pueda interpretarse como tal y devuelve un valor booleano (<code>bool</code>): <code>true</code> si todos los caracteres del texto son dígitos numéricos (del '0' al '9'), y <code>false</code> en caso contrario o si la cadena está vacía.
    </p>

</body>
</html>