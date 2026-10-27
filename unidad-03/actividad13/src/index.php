<?php

include __DIR__ . '/ej13.php';
//También era con una tabla y opcionalmente con un array

echo Tarifa::IVA . "%" . "<br>";
$tarifa1 = Tarifa::calcularConIva(100);
echo $tarifa1 . "<br>";
$tarifa2 = Tarifa::calcularConIva(50);
echo $tarifa2 . "<br>";
$tarifa3 = Tarifa::calcularConIva(0);
echo $tarifa3 . "<br>";

/*
Porque no estamos creando una nueva instancia de Tarifa ya que con constantes no es necesario.
Porque estamos usando una constante y con una constante se usa self:: o nombreClase::
Porque cuando trabajamos con constantes no es necesario usar $.
No puede reasignarse la constante durante la ejecución porque se cambiaría el valor por referencia.
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    try{
    echo Tarifa::calcularConIva(-5); 
    }catch(InvalidArgumentException $e){
        throw new InvalidArgumentException("Error: " . $e);
    }   
    ?>
</body>
</html>