<?php

function aplicarDescuento(float $precio, float $porcentaje = 10) : float
{
    $descuento = ($porcentaje * $precio)/100;
    return $precio - $descuento;
}
$precioInicial = 100;
$descuentoInicial = 30;
$porcentajeIn = 10;
//Guardar los resultados de funciones en una variable fuera del html
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Descuentos</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Descuento</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td><?= $descuentoInicial ?></td>
            <td><?= aplicarDescuento($precioInicial,$descuentoInicial) ?></td>
        </tr>
        <tr>
            <td><?= $porcentajeIn ?></td>
            <td><?= aplicarDescuento($precioInicial) ?></td>
        </tr>
    </table>
</body>
</html>