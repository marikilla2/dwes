<?php

abstract class Figura{

    abstract public function calcularArea(): float;
}

class Rectangulo extends Figura{
    #[Override]
    function calcularArea(): float
    {
        throw new \Exception('Not implemented');
    }
}

class Circulo extends Figura{
    #[Override]
    function calcularArea(): float
    {
        throw new \Exception('Not implemented');
    }
}

?>