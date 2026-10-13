<?php
    
    function descuento(int $precio, int $porcentaje) : float
    {
        $precioFinal = $precio - (($precio * $porcentaje)/ 100);
        return $precioFinal;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="precio">
        <input type="number" name="porcentaje" min="0" max="100">
        <button type="submit">Enviar</button>
    </form>

    <?php
        $precio = $_POST['precio'];
        $porcentaje = $_POST['porcentaje'];
        $resultado = descuento($precio, $porcentaje);
        echo "El precio final es: " . $resultado;
    ?>
</body>
</html>