<?php

$original = 'PHP, JavaScript, PHP, Python';

// Sustitución con str_replace y conteo en el cuarto argumento
$nuevoTexto = str_replace('PHP', 'Laravel', $original, $sustituciones);

echo "Texto original: $original\n";
echo "Nuevo texto: $nuevoTexto\n";
echo "Número de cambios: $sustituciones\n\n";

// División con explode y limpieza con trim
$partes = explode(',', $nuevoTexto);
$lenguajesLimpios = [];

foreach ($partes as $parte) {
    $lenguajesLimpios[] = trim($parte);
}

// Presentación en lista HTML
echo "<ul>\n";
foreach ($lenguajesLimpios as $lenguaje) {
    echo "    <li>$lenguaje</li>\n";
}
echo "</ul>\n\n";

// Unión de nuevo con implode
$textoUnido = implode(' · ', $lenguajesLimpios);
echo "Texto unido: $textoUnido\n\n";

// Comprobaciones
$totalElementos = count($lenguajesLimpios);
echo "Comprobación de elementos (4): " . ($totalElementos === 4 ? "Sí ($totalElementos elementos)" : "No") . "\n";
echo "Comprobación de sustituciones (2): " . ($sustituciones === 2 ? "Sí ($sustituciones sustituciones)" : "No") . "\n";

?>