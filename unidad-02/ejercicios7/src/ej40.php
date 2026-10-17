<?php

$original = 'PHP, JavaScript, PHP, Python';

$nuevoTexto = str_replace('PHP', 'Laravel', $original, $sustituciones);

echo "Texto original: $original\n";
echo "Nuevo texto: $nuevoTexto\n";
echo "Número de cambios: $sustituciones\n\n";


$partes = explode(',', $nuevoTexto);
$lenguajesLimpios = [];

foreach ($partes as $parte) {
    $lenguajesLimpios[] = trim($parte);
}


echo "<ul>\n";
foreach ($lenguajesLimpios as $lenguaje) {
    echo "    <li>$lenguaje</li>\n";
}
echo "</ul>\n\n";

$textoUnido = implode(' · ', $lenguajesLimpios);
echo "Texto unido: $textoUnido\n\n";

$totalElementos = count($lenguajesLimpios);
echo "Comprobación de elementos (4): " . ($totalElementos === 4 ? "Sí ($totalElementos elementos)" : "No") . "\n";
echo "Comprobación de sustituciones (2): " . ($sustituciones === 2 ? "Sí ($sustituciones sustituciones)" : "No") . "\n";

?>