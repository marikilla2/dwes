<?php
    $nombre = $_POST["nombre"] ?? "";
    $nombreHtml = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
    $p1 = $_POST["p1"] ?? "";
    $p1Html = htmlspecialchars($p1, ENT_QUOTES, 'UTF-8');
    $p2 = $_POST["p2"] ?? "";
    $p2Html = htmlspecialchars($p2, ENT_QUOTES, 'UTF-8');
    $casilla = $_POST["casilla"] ?? "No";
    $casillaHtml = htmlspecialchars($casilla, ENT_QUOTES, 'UTF-8');
    $texto = $_POST["texto"] ?? "";
    $textoHtml = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Resultado</h1>
    <p>Hola, <?= $nombreHtml ?>.</p>
    <p>Opciones seleccionadas: <?= $p1Html ?> <?= $p2Html ?></p>
    <p>Casilla: <?= $casillaHtml ?></p>
    <p>El texto procesado es: <?= $textoHtml ?></p>
    <p><a href="ej07-formulario.html">Volver al formulario</a></p>
</body>
</html>