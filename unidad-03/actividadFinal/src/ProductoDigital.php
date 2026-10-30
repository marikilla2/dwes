<?php
class ProductoDigital extends Producto{
    #[Override]
    public function calcularGastosEnvio(): float
    {
        throw new \Exception('Not implemented');
    } 
}
?>