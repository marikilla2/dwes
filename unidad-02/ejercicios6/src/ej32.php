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
    $enviado = $_SERVER['REQUEST_METHOD'] === 'POST';

    if($enviado){
        $precio = (int) $_POST['precio'];
        $porcentaje = (int) $_POST['porcentaje'];
        if($precio < 0 || $precio > 100){
            echo "Error, no está en el rango entre 0 y 100";
        }else{
            $resultado = descuento($precio, $porcentaje);
            echo "El precio final es: " . $resultado;
        }
        
        
    }
        
    ?>
</body>
</html>