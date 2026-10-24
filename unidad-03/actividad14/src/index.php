<?php

include __DIR__ . '/ej14.php';

// Valor esperado del contador antes de este paso: 0
$c1 = Reserva::getTotalCreadas();
echo $c1;

// Valor esperado del contador antes de este paso: 0
$r1 = new Reserva("Ana");
$c2 = Reserva::getTotalCreadas();
echo $c2;
// Valor esperado del contador antes de este paso: 1
$r2 = new Reserva("Luis");
$c3 = Reserva::getTotalCreadas();
echo $c3;
// Valor esperado del contador antes de este paso: 2
$r1_copia = $r1;
$c4 = Reserva::getTotalCreadas();
echo $c4;
// Valor esperado del contador antes de este paso: 2
try {
    $r_invalida = new Reserva("     ");
} catch (Exception $e) {
}
$c5 = Reserva::getTotalCreadas();
echo $c5;
// Valor esperado del contador antes de este paso: 2
$r3 = new Reserva("María");
$c6 = Reserva::getTotalCreadas();
echo $c6;
// Obtención de clientes mediante getters
$cliente1 = $r1->getCliente();
$cliente2 = $r2->getCliente();
$cliente3 = $r3->getCliente();
$contadorFinal = Reserva::getTotalCreadas();

echo $cliente1 . $cliente2 . $cliente3;

/*
Sí. Cada vez que se recarga la página en el navegador, se realiza una nueva solicitud HTTP al servidor web,
lo que provoca que el script index.php se ejecute íntegramente desde la primera línea.

No. En PHP, los objetos y el estado estático de las clases viven exclusivamente en 
la memoria RAM asignada al proceso de ejecución de esa petición concreta. 
Al finalizar la respuesta, toda la memoria se libera y al recargar se inicia 
un ciclo completamente limpio.

Representa estrictamente las reservas construidas correctamente durante la ejecución actual, 
ya que no existe ningún mecanismo de persistencia en base de datos 
o almacenamiento en disco entre solicitudes independientes.

*/
?>