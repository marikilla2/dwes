<?php

abstract class Tarifa{

    public function calcularImporte(int $horas): float{
        if ($horas <= 0){
            throw new InvalidArgumentException("Las horas no pueden ser negativas");
        }
            return $horas * 2.0;
        
    }


}

class TarifaCoche extends Tarifa{
    
}

class TarifaMoto extends Tarifa{
    public function calcularImporte(int $horas) : float{
        if ($horas <= 0){
            throw new InvalidArgumentException("Las horas no pueden ser negativas");
        }
            return $horas * 1.0;
        
    }
}

?>