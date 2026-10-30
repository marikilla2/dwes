<?php
final class ProductoDigital extends Producto{
    #[Override]
    public function calcularGastosEnvio(): float
    {
        return 0.0;
    } 

    #[Override]
    public function obtenerDescripcion(): string
    {
        return parent::obtenerDescripcion() . "/Descarga Digital";
    }
}
?>