<?php

abstract class Figura{

    abstract public function calcularArea(): float; //Es obligatorio sobreescribir los métodos abstractos
}

class Rectangulo extends Figura{
    
    private float $base;
    private float $altura;

    public function __construct(float $base, float $altura) {
        if ($base <= 0 || $altura <= 0) {
            throw new InvalidArgumentException("La base y la altura deben ser valores positivos.");
        }
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea(): float {
        return $this->base * $this->altura;
    }
}

class Circulo extends Figura{
    private float $radio;

    public function __construct(float $radio) {
        if ($radio <= 0) {
            throw new InvalidArgumentException("El radio debe ser un valor positivo.");
        }
        $this->radio = $radio;
    }

    public function calcularArea(): float {
        return pi() * ($this->radio * $this->radio);
    }
}

?>