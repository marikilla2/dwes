<?php
    $nombre = $_GET['nombre'] ?? '';
    $nombreHtml = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
    $apellido1 = $_GET['apellido1'] ?? '';
    $apellido1Html = htmlspecialchars($apellido1, ENT_QUOTES, 'UTF-8');
    $apellido2 = $_GET['apellido2'] ?? '';
    $apellido2Html = htmlspecialchars($apellido2, ENT_QUOTES, 'UTF-8');

    $correo = $_GET['correo'] ?? '';
    $correoHtml = htmlspecialchars($correo, ENT_QUOTES, 'UTF-8');
    $año_nac = $_GET['año_nac'] ?? '';
    $año_nacHtml = htmlspecialchars($año_nac, ENT_QUOTES, 'UTF-8');
    $telefono = $_GET['telefono'] ?? '';
    $telefonoHtml = htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado GET</title>
</head>
<body>
    <h1>Resultado</h1>
    <p>Hola, <?= $nombreHtml ?>.</p>
    <p>Tus apellidos son: <?= $apellido1Html ?> <?= $apellido2Html ?></p>
    <p>Tu correo es: <?= $correoHtml ?></p>
    <p>Tu año de nacimiento es: <?= $año_nacHtml ?></p>
    <p>Tu teléfono es: <?= $telefonoHtml ?></p>
    <p><a href="ej07-formulario.html">Volver al formulario</a></p>
</body>
</html>