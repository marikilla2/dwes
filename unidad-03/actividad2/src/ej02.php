<?php

declare(strict_types=1);
require_once __DIR__ . '/index.php';

class Rectangulo{
    public float $base = 0.0;
    public float $altura = 0.0;

    function calcularArea(): float{
        return $this->base * $this->altura;
    }
    function calcularPerimetro(): float{
        return ($this->base * 2)+ ($this->altura * 2);
    }
    function esCuadrado(): bool{
        if ($this->base === $this->altura){
            return true;
        }else{
            return false;
        }
    }
}




?>