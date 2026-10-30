<?php
include __DIR__ . "/ej23.php";

function describir(Describible $elemento): string{
    return $elemento->obtenerDescripcion();
}

$libro = new Libro("Aprender PHP");
$revista = new Revista("Tecnología actual");
$aviso = new Aviso("Biblioteca cerrada el lunes");

echo describir($libro) . "<br>";
echo describir($revista) . "<br>";
echo describir($aviso) . "<br>";

echo $libro->getDiasPrestamo() . "<br>";
echo $revista->getDiasPrestamo();

/*
    Comparten el titulo y el metodo obtenerDescripcion.
    La interfaz Describible permite obtener la descripción de los 3 objetos.
    Porque aviso solo implementa Describible y no le hace falta heredar de recurso
    ya que no es un recurso en sí.
    Necesitariamos tener una variable privada de algún texto para poder usar
    obtenerDescripcion.
*/

?>