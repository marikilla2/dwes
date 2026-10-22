<?php
include __DIR__ . '/ej06.php';

$libro1 = new Libro("El cuarto de atrás", "Carmen Martín Gaite", 500);
$libro2 = new Libro("El Quijote", "Cervantes");

echo $libro1->obtenerFicha();
echo $libro2->obtenerFicha();

echo $libro1->getTitulo();
echo '<br>';
echo $libro2->getAutor();
echo $libro2->getPaginas();

echo '<br>';

$libro3 = new Libro("", "", -6);

echo $libro3->obtenerFicha();

// No puedo hacer $libro->paginas = 220; porque la encapsulación es privada y no se puede modificar.
?>