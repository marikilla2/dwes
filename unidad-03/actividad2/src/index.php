<?php

declare(strict_types=1);
include __DIR__ . '/ej02.php';

$rectangulo = new Rectangulo();
$cuadrado = new Rectangulo();

$rectangulo->base = 5.0;
$rectangulo->altura = 3.0;

$cuadrado->base = 4.0;
$cuadrado->altura = 4.0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo $rectangulo->calcularArea();
        echo $cuadrado->calcularArea();

        echo '<br>';

        echo $rectangulo->calcularPerimetro();
        echo $cuadrado->calcularPerimetro();
    ?>
</body>
</html>