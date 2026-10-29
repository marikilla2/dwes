<?php

require_once __DIR__ . 'ej18.php';

function obtenerArea(Figura $figura): float {
    return $figura->calcularArea();
}

$figuras = [
    new Rectangulo(5.0, 3.0),
    new Circulo(2.0)
];

$sumaAreas = 0.0;

foreach ($figuras as $figura) {
    $area = obtenerArea($figura);
    $sumaAreas += $area;
    //El instanceof no sé que hace exactamente pero si figura es un rectángulo hace una cosa y si no hace otra cosa
    $tipo = ($figura instanceof Rectangulo) ? "Área del rectángulo" : "Área del círculo";
    echo "$tipo: " . number_format($area, 2, ',', '') . "<br>";
}

echo "Suma de áreas: " . number_format($sumaAreas, 2, ',', '') . "<br>";

/*
 * Preguntas teóricas:
 * 
 * ¿Por qué no podemos crear new Figura()?
 * Una clase abstracta define una interfaz o contrato parcial y contiene métodos sin implementar 
 * (métodos abstractos). PHP prohíbe instanciarla directamente porque estaría incompleta y no sabría 
 * cómo ejecutar la lógica de los métodos que no tienen cuerpo definido.
 * 
 * ¿Qué ocurriría si una hija concreta no implementase calcularArea()?
 * PHP lanzaría un error fatal (Fatal Error) al intentar cargar la clase o ejecutar el script, 
 * indicando que la clase concreta no puede heredar el método abstracto a menos que ella misma 
 * se declare como abstracta o implemente todos los métodos abstractos heredados de la clase padre.
 */

?>