<?php

class CuentaBancaria{
    private string $titular;
    private float $saldo;

    function __construct(string $titular, float $saldo = 0.0)
    {
        $titularNuevo = trim($titular);

        if($titularNuevo == ""){
            throw new InvalidArgumentException("No puede haber un titular vacío");
        }
        if($saldo < 0.0){
            throw new InvalidArgumentException("No puede ser el saldo negativo");
        }

        $this->titular = $titularNuevo;
        $this->saldo = $saldo;
        
    }

        function getTitular(): string{
                return $this->titular;
        }
        function getSaldo(): float{
            return $this->saldo;
        }

        function ingresar(float $importe): bool{
            if($importe > 0.0){
                $this->saldo += $importe;
                return true;
            }else{
                return false;
            }
        }

        function retirar(float $importe): bool{
            if ($importe > 0.0 && $importe <= $this->saldo) {
                $this->saldo -= $importe;
                return true;
            }else{
                return false;
            }
        }
}
?>