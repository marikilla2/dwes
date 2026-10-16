<?php
function aplicarDescuento(float $precio, float $porcentaje = 10) : float
{
    $descuento = ($porcentaje * $precio)/100;
    return $precio - $descuento;
}

function formatearPrecio(float $precio): string
{
    $precioF = $precio;
    return $precioF;
}


?>