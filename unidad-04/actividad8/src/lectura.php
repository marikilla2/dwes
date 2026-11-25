<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

const COOKIE_TAMANO = 'ud04_tamano_lectura';

$tamanos = [
    'normal'     => ['texto' => 'Normal',     'clase' => 'lectura-normal'],
    'grande'     => ['texto' => 'Grande',     'clase' => 'lectura-grande'],
    'muy-grande' => ['texto' => 'Muy grande', 'clase' => 'lectura-muy-grande'],
];

$opciones = [
    'expires'  => time() + 30 * 24 * 60 * 60,   // 30 días
    'path'     => '/',
    'secure'   => false,
    'httponly' => true,
    'samesite' => 'Lax',
];

$error = '';

$tamano = 'normal';
$recibido = $_COOKIE[COOKIE_TAMANO] ?? '';

if (is_string($recibido) && array_key_exists($recibido, $tamanos)) {
    $tamano = $recibido;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'guardar') {
        $elegido = $_POST['tamano'] ?? '';

        if (!is_string($elegido) || !array_key_exists($elegido, $tamanos)) {
            $error = 'Selecciona un tamaño de lectura válido.';
        } elseif (setcookie(COOKIE_TAMANO, $elegido, $opciones)) {
            header('Location: lectura.php', true, 303);
            exit;
        } else {
            $error = 'No se ha podido guardar la preferencia.';
        }
    } elseif ($accion === 'restablecer') {
        $opciones['expires'] = time() - 3600;

        if (setcookie(COOKIE_TAMANO, '', $opciones)) {
            header('Location: lectura.php', true, 303);
            exit;
        }
        $error = 'No se ha podido restablecer la preferencia.';
    } else {
        $error = 'La acción no es válida.';
    }
}

$textoActual = $tamanos[$tamano]['texto'];
$claseActual = $tamanos[$tamano]['clase'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lectura cómoda</title>
    <style>
        .lectura-normal {
            font-size: 1rem;
        }

        .lectura-grande {
            font-size: 1.25rem;
        }

        .lectura-muy-grande {
            font-size: 1.5rem;
        }

        .articulo {
            line-height: 1.7;
            max-width: 65ch;
        }
    </style>
</head>
<body>
    <h1>Noticias de informática</h1>

    <?php if ($error !== ''): ?>
        <p role="alert"><?= e($error) ?></p>
    <?php endif; ?>

    <p role="status">Tamaño de lectura actual: <strong><?= e($textoActual) ?></strong></p>

    <form action="lectura.php" method="post">
        <label for="tamano">Tamaño de lectura:</label>
        <select id="tamano" name="tamano">
            <?php foreach ($tamanos as $clave => $datos): ?>
                <option value="<?= e($clave) ?>" <?= $clave === $tamano ? 'selected' : '' ?>>
                    <?= e($datos['texto']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="accion" value="guardar">Guardar preferencia</button>
    </form>

    <form action="lectura.php" method="post">
        <button type="submit" name="accion" value="restablecer">Restablecer preferencia</button>
    </form>

    <article class="articulo <?= e($claseActual) ?>">
        <h2>Un instituto convierte sus portátiles antiguos en un clúster de cálculo</h2>
        <p>
            El departamento de Informática de un instituto andaluz ha reunido veinte portátiles
            que iban a reciclarse y los ha conectado en red para formar un pequeño clúster.
            El alumnado de segundo de DAW se ha encargado de instalar el sistema operativo
            y de configurar los servicios necesarios.
        </p>
        <p>
            Con este equipo, los estudiantes pueden lanzar tareas en paralelo, probar
            contenedores y comprobar cómo se reparte el trabajo entre varias máquinas.
            Según el profesorado, ver los procesos repartidos en tiempo real ayuda a entender
            conceptos que antes solo se explicaban con diagramas.
        </p>
        <p>
            El proyecto también tiene una parte medioambiental: alargar la vida útil de los equipos
            reduce los residuos electrónicos del centro. El próximo curso pretenden documentarlo
            en una web, para que otros institutos puedan reproducir la experiencia.
        </p>
    </article>
</body>
</html>