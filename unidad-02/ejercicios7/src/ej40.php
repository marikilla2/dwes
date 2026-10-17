<?php

$original = 'PHP, JavaScript, PHP, Python';

$nuevoTexto = str_replace('PHP', 'Laravel', $original, $sustituciones);

echo "Texto original: $original";
echo "Nuevo texto: $nuevoTexto";
echo "Número de cambios: $sustituciones";


$partes = explode(',', $nuevoTexto);
$lenguajesLimpios = [];

foreach ($partes as $parte) {
    $lenguajesLimpios[] = trim($parte);
}


echo "<ul>";
foreach ($lenguajesLimpios as $lenguaje) {
    echo "    <li>$lenguaje</li>";
}
echo "</ul>";

$textoUnido = implode(' · ', $lenguajesLimpios);
echo "Texto unido: $textoUnido";

$totalElementos = count($lenguajesLimpios);
echo "Comprobación de elementos (4): " . ($totalElementos === 4 ? "Sí ($totalElementos elementos)" : "No") . "<br>";
echo "Comprobación de sustituciones (2): " . ($sustituciones === 2 ? "Sí ($sustituciones sustituciones)" : "No") . "<br>";

?>