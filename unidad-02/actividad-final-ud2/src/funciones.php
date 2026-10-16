<?php
function calcularSubtotal(float $precio, int $cantidad): float
{
    $precioUnitario = $precio * $cantidad;
    return $precioUnitario;
}

function obtenerDescuento(string $tipoCliente): int
{
    if ($tipoCliente == 'estudiante') {
        return 10;
    } else {
        return 0;
    }
}

function calcularDescuento(float $subtotal, int $porcentaje): float
{
    $precioFinal = $subtotal * ($porcentaje / 100);
    return $precioFinal;
}

function calcularIVA(float $base, float $porcentaje = 21): float
{
    return ($base * (1 + ($porcentaje / 100))) - $base;
}   

function formatearPrecio(float $importe): string
{
    $formateado = number_format($importe, 2, ',', '.');
    return $formateado;
}
?>