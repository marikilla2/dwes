<?php

include __DIR__ . '/ej11.php';
$autorAna = new Autor("Ana López");

$libro1 = new Libro("Aprender PHP", 20.0, $autorAna);
$libro2 = new Libro("Practicar PHP", 15.0, $autorAna);

echo "Estado Inicial";
echo "Libro: " . $libro1->getTitulo() . " | Precio: " . $libro1->getPrecio() . "€ | Autor: " . $libro1->getAutor()->getNombre() . "<br>";
echo "Libro: " . $libro2->getTitulo() . " | Precio: " . $libro2->getPrecio() . "€ | Autor: " . $libro2->getAutor()->getNombre() . "<br>";

$autorAna->setNombre("Ana López García");
echo "--- Tras actualizar el nombre del autor ---\n";
echo "Libro: " . $libro1->getTitulo() . " | Precio: " . $libro1->getPrecio() . "€ | Autor: " . $libro1->getAutor()->getNombre() . "<br>";
echo "Libro: " . $libro2->getTitulo() . " | Precio: " . $libro2->getPrecio() . "€ | Autor: " . $libro2->getAutor()->getNombre() . "<br>";

$resultadoCambio = $autorAna->setNombre("   ");
echo "Intento de cambio a espacios vacíos: " . ($resultadoCambio ? "Aceptado" : "Rechazado") . "\n";
echo "--- Tras intento fallido ---\n";
echo "Libro 1 - Autor: " . $libro1->getAutor()->getNombre() . "<br>";
echo "Libro 2 - Autor: " . $libro2->getAutor()->getNombre() . "<br>";


/*
 * CUESTIONARIOS Y RESPUESTAS:
 * 
 * Cuántos objetos has creado?
 * Se han creado 3 objetos en total: 1 objeto de la clase Autor y 2 objetos de la clase Libro.
 * 
 * Por qué cambia el autor que muestran los dos libros?
 * Cambia porque ambos objetos Libro almacenan una referencia al *mismo* objeto Autor en memoria. 
 * Al modificar el estado de ese único objeto Autor mediante su método setNombre(), el cambio se 
 * refleja de forma automática en todas las referencias que apuntan hacia él.
 * 
 * Devolver el autor mediante un getter crea una copia independiente?
 * No. En PHP, los objetos se asignan y pasan por referencia (a través de identificadores). 
 * El método getAutor() devuelve exactamente la misma instancia del objeto original almacenada en la propiedad, 
 * por lo que no genera ninguna copia independiente.
 */
?>