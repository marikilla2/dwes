<?php

include __DIR__ . '/ej12.php';

$miBiblioteca = new Biblioteca();
echo "Estado Inicial de la Biblioteca" . "<br>";
echo "Número de libros: " . $miBiblioteca->contarLibros() . "<br>";
echo "Valor total: " . number_format($miBiblioteca->calcularValorTotal(), 2, ',', '.') . "<br>";

$autor1 = new Autor("Ana López");
$autor2 = new Autor("Carlos Pérez");

$libro1 = new Libro("Aprender PHP", 20.0, $autor1);
$libro2 = new Libro("Practicar PHP", 15.0, $autor1);
$libro3 = new Libro("Bases de datos", 30.0, $autor2);

$miBiblioteca->anadirLibro($libro1);
$miBiblioteca->anadirLibro($libro2);
$miBiblioteca->anadirLibro($libro3);

echo "Listado de Libros en la Biblioteca" . "<br>";
echo "Título" . " | " . "Autor" . " | " . "Precio" . "<br>";

foreach ($miBiblioteca->getLibros() as $libro) {
    echo $libro->getTitulo() . " | " . $libro->getAutor()->getNombre() . " | " . number_format($libro->getPrecio(), 2, ',', '.') . " €" . "<br>";
}
echo "<br>";

echo "Resumen Final: ";
echo $miBiblioteca->contarLibros() . " libros y " . number_format($miBiblioteca->calcularValorTotal(), 2, ',', '.') . " €." . "<br>";

/*
 * CUESTIÓN: Por qué anadirLibro() no necesita crear otro objeto Libro?
 * 
 * Explicación:
 * El método anadirLibro() recibe una instancia ya creada de la clase Libro a través de su parámetro tipado (Libro $libro). 
 * Almacena directamente esa misma referencia en el array interno mediante `$this->libros[] = $libro;`. 
 * Crear un nuevo objeto Libro dentro del método duplicaría la información y crearía una entidad independiente 
 * desvinculada del objeto original que el usuario instanció y configuró externamente. El objetivo de la biblioteca 
 * es agrupar y gestionar los libros existentes, no clonarlos.
 */

?>