<?php
require_once __DIR__ . '/ej34-funciones.php';

$mensaje = "Primera línea\nSegunda línea";
echo $mensaje;
echo '<br>';

echo nl2br(htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'));

//Hace un array de productos y luego llama a la función con los parámetros del array
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
        $precioFinal = aplicarDescuento(100,5);
        formatearPrecio($precioFinal);

        echo $precioFinal;
        echo '<br>';


    ?>
</body>
</html>