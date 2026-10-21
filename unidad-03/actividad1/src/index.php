<?php

declare(strict_types=1);
include __DIR__ . '/ej01.php';

$libro1 = new Libro();
$libro2 = new Libro();

$libro1->titulo = "Don Quijote";
$libro1->autor = "Cervantes";
$libro1->paginas = 400;


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
        echo $libro1->titulo;
        echo $libro1->autor;

        echo $libro1->obtenerFicha();
        // He creado dos libros desde la plantilla Libro.

    ?>
</body>
</html>