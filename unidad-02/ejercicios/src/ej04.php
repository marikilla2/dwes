<?php 
$precio = 25;
$unidades = 4;
$descuento = 0.10;
const IVA = 0.21;

// Mejor con variables intermedias, ya que si no es más complejo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <p>Subtotal: <?php echo ($precio*$unidades)?></p>
    <p>Importe descontado: <?php echo ($precio*$unidades)*$descuento?></p>
    <p>Base tras descuento: <?php echo ($precio*$unidades) - ($precio*$unidades)*$descuento?></p>
    <p>Importe del IVA: <?php echo (($precio*$unidades) - ($precio*$unidades)*$descuento)*IVA?></p>
    <p>Total final: <?php echo (($precio*$unidades) - ($precio*$unidades)*$descuento) + ((($precio*$unidades) - ($precio*$unidades)*$descuento)*(IVA))?></p>
</body>
</html>