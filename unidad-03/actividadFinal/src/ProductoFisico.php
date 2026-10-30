<?php
class ProductoFisico extends Producto{
    #[Override]
    public function calcularGastosEnvio(): float
    {
        throw new \Exception('Not implemented');
    }
}
?>