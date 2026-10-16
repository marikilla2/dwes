<?php

$texto = 'PHP y Laravel';
$busquedas = ['PHP', 'Laravel', 'Python'];

foreach ($busquedas as $busqueda) {
    $posicion = strpos($texto, $busqueda);
    
    if ($posicion !== false) {
        echo "Búsqueda de '$busqueda': Posición $posicion\n";
    } else {
        echo "Búsqueda de '$busqueda': No encontrado\n";
    }
}

function evaluarArchivo(string $nombreArchivo) {
    echo "Evaluando: '$nombreArchivo'\n";
    
    $contiene = str_contains($nombreArchivo, 'ejercicio') ? 'Sí' : 'No';
    $empieza  = str_starts_with($nombreArchivo, 'ej') ? 'Sí' : 'No';
    $termina  = (str_ends_with($nombreArchivo, '.php') || str_ends_with($nombreArchivo, '.html')) ? 'Sí' : 'No';
    
    echo "- Contiene 'ejercicio': $contiene\n";
    echo "- Empieza por 'ej': $empieza\n";
    echo "- Termina en '.php' o '.html': $termina\n\n";
}

// 1. Prueba con 'ejercicio.php'
evaluarArchivo('ejercicio.php');

// 2. Prueba con 'Ejercicio.PHP'
evaluarArchivo('Ejercicio.PHP');

?>