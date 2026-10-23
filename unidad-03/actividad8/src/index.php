<?php
include __DIR__ .  '/ej08.php';

$teclado = new Producto('teclado', 25.0);

echo $teclado->calcularImporte(3) . "<br>";

$teclado->setPrecio(30.0);

echo $teclado->calcularImporte(3). "<br>";

$teclado->setPrecio(0.0);

echo $teclado->calcularImporte(3). "<br>";


// Porque un setter solo cambia un determinado valor de la clase.
// setPrecio() devuelve booleano porque intenta cambiar el precio y comprueba si puede.
// getPrecio() es el método de lectura de un valor de la clase.
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
        try{
            $teclado->setPrecio(-5.0);
        }catch(Exception $e){
            throw new Exception("El nuevo precio no puede ser negativo");
        }

        $teclado->calcularImporte(0);
        
    ?>
</body>
</html>