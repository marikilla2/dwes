<?php

require_once __DIR__ . './ej17.php';

function obtenerImporte(Tarifa $tarifa, int $horas): float
{
    return $tarifa->calcularImporte($horas);
}

$tarifaCoche = new TarifaCoche();
$tarifaMoto = new TarifaMoto();

echo "--- Llamadas individuales ---\n";
echo "Coche: " . number_format(obtenerImporte($tarifaCoche, 3), 2, ',', '.') . " €\n";
echo "Moto:  " . number_format(obtenerImporte($tarifaMoto, 3), 2, ',', '.') . " €\n\n";

$tarifas = [$tarifaCoche, $tarifaMoto];

echo "--- Recorrido con foreach ---\n";
foreach ($tarifas as $tarifa) {
    echo "Importe: " . number_format(obtenerImporte($tarifa, 3), 2, ',', '.') . " €\n";
}


?>