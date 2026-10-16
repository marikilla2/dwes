<?php
function duplicar(int $numero): int {
    return $numero * 2;
}

$funcion = 'duplicar';
$numero = 5;

echo "Duplicar: " . $funcion($numero) . "<br>";

$triplicar = function (int $numero): int {
    return $numero * 3;
};

echo "Triplicar: " . $triplicar($numero) . "<br>";

$incremento = 4;

$sumarIncremento = fn(int $numero): int => $numero + $incremento;

echo "Sumar incremento: " . $sumarIncremento($numero) . "<br>";
?>