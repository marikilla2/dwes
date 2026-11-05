<?php

function campoTexto(string $clave) : string {
    $valor = $_POST[$clave] ?? '';
    return trim($valor);
}

function escape(string $texto): string{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$nombre = '';
$correo = '';
$edad = '';
$errores = [];
$correcto = false;

if(($_SERVER['REQUEST_METHOD'] ?? '') === 'POST'){
    $nombre = campoTexto('nombre');
    $correo = campoTexto('correo');
    $edad = campoTexto('edad');

    if ($nombre === '') {
        $errores['nombre'] = 'Escribe tu nombre';
    } else if (mb_strlen($nombre, 'UTF-8') < 3 || mb_strlen($nombre, 'UTF-8') > 80) {
        $errores['nombre'] = 'El nombre debe tener entre 3 y 80 caracteres';
    }

    if ($correo === '') {
        $errores['correo'] = 'Escribe tu correo';
    } else if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
        $errores['correo'] = 'Escribe un correo válido';
    }

    if ($edad === '') {
        $errores['edad'] = 'Escribe la edad';
    } else {
        $edadValidada = filter_var($edad, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 16, 'max_range' => 99]
        ]);
        if ($edadValidada === false) {
            $errores['edad'] = 'La edad debe ser un número entero entre 16 y 99';
        }
    }

    $correcto = $errores === [];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>

    <?php if ($correcto): ?>
        <p style="color: green;"><strong>¡Formulario enviado correctamente!</strong></p>
    <?php endif; ?>

    <form action="" method="post">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= escape($nombre) ?>">
            <?php if (isset($errores['nombre'])): ?>
                <span><?= escape($errores['nombre']) ?></span>
            <?php endif; ?> 
        </p>
        <p>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="correo" value="<?= escape($correo) ?>">
            <?php if (isset($errores['correo'])): ?>
                <span><?= escape($errores['correo']) ?></span>
            <?php endif; ?> 
        </p>
        <p>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="16" max="99" value="<?= escape($edad) ?>">
            <?php if (isset($errores['edad'])): ?>
                <span><?= escape($errores['edad']) ?></span>
            <?php endif; ?>
        </p>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>