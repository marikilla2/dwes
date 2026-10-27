<?php

class Tarifa{
    public const IVA = 0.21;
    //static es un método desde el que se puede acceder directamente sin instanciar un objeto.
    public static function calcularConIva(float $base): float
    {
        if($base < 0){
            throw new InvalidArgumentException("La base no puede ser negativa");
        }
        return $base * (1 + self::IVA);
    }
}

?>