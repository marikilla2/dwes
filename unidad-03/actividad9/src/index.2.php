<?php

require_once __DIR__ . '/ej09.2.php';

$curso1 = new Curso('PHP', 30);
$curso2 = new Curso('Laravel');

echo "Curso 1: " . $curso1->getNombre() . ", " . $curso1->getHoras() . " horas\n";
echo "Curso 2: " . $curso2->getNombre() . ", " . $curso2->getHoras() . " horas\n";

?>