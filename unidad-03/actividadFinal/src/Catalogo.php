<?php

class Catalogo
{
    private array $productos = [];

    public function anadirProducto(Producto $producto): void
    {
        $this->productos[] = $producto;
    }

    public function getProductos(): array
    {
        return $this->productos;
    }

    public function contarProductos(): int
    {
        return count($this->productos);
    }

    public function calcularValorTotal(): float
    {
        $total = 0.0;

        foreach ($this->productos as $producto) {
            $total += $producto->calcularTotal();
        }

        return $total;
    }
}

?>