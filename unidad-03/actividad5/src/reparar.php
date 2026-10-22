<?php
declare(strict_types=1);

class Entrada
{
    public string $evento = 'Concierto';
    public float $precio = 12.0;

    public function calcularTotal(int $cantidad): float
    {
        return $precio * $cantidad; // Error 1 falta this
    }
}

$entrada = Entrada(); // Error 2 falta new
echo $entrada['evento']; // Error 3 falta ->
echo '<br>';
echo $entrada->calcularTotal(3);