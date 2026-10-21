<?php
declare (strict_types=1);

class Marcador{
    public int $puntos = 0;

    function anotarPunto():void{
        $this->puntos++;
    }
    function reiniciar() :void{
        $this->puntos = 0;
    }
    function obtenerPuntos(): int{
        return $this->puntos;
    }
}

$m1 = new Marcador();
$m2 = new Marcador();

$m1->anotarPunto();
$m1->anotarPunto();
$m1->anotarPunto();
$m2->anotarPunto();

echo $m1->obtenerPuntos();
echo $m2->obtenerPuntos();

$m1->reiniciar();
echo '<br>';

echo $m1->obtenerPuntos();
echo $m2->obtenerPuntos();
?>