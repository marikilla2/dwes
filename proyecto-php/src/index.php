<?php
    date_default_timezone_set("Europe/Madrid");

    $modulo = "Desarrollo Web en Entorno Servidor";
    $curso = "2.º DAW";
    $mensaje = "Nuestro primer proyecto PHP está funcionando.";
    $fecha = date("d/m/Y");
    $hora = date("H:i:s");
    $versionPhp = phpversion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer proyecto PHP</title>
</head>
<body>
    <header>
        <h1>Primer proyecto PHP</h1>
    </header>

    <main>
        <h2><?php echo $modulo; ?></h2>

        <p>Curso: <?php echo $curso; ?></p>
        <p><?php echo $mensaje; ?></p>

        <h2>Información generada en el servidor</h2>

        <ul>
            <li>Fecha: <?php echo $fecha; ?></li>
            <li>Hora: <?php echo $hora; ?></li>
            <li>Versión de PHP: <?php echo $versionPhp; ?></li>
        </ul>
    </main>
</body>
</html>