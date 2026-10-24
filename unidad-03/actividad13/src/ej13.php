<?php

class Tarifa{
    public const IVA = 0.21;

    public static function calcularConIva(float $base): float
    {
        if($base < 0){
            throw new InvalidArgumentException("La base no puede ser negativa");
        }
        return $base * (1 + self::IVA);
    }
}

?>