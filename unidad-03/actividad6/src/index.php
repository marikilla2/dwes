<?php
include __DIR__ . '/ej06.php';

$libro1 = new Libro("El cuarto de atrás", "Carmen Martín Gaite", 500);
$libro2 = new Libro("El Quijote", "Cervantes");

$libro3 = new Libro("", "", -6);

//Se puede añadir try-catch para capturar errores en php
// No puedo hacer $libro->paginas = 220; porque la encapsulación es privada y no se puede modificar.
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
        echo htmlspecialchars($libro1->obtenerFicha(), ENT_QUOTES, 'UTF-8');
        echo htmlspecialchars($libro2->obtenerFicha(), ENT_QUOTES, 'UTF-8');

        echo $libro1->getTitulo();
        echo '<br>';
        echo $libro2->getAutor();
        echo $libro2->getPaginas();

        echo '<br>';

        echo $libro3->obtenerFicha();
    ?>
</body>
</html>