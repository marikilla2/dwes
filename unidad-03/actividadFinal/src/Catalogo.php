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

    /**
     * Calcula el importe total conjunto de todos los productos contenidos en el catálogo.
     * 
     * Recorre la colección de productos invocando de forma polimórfica el método
     * calcularTotal() de cada uno (precio base + gastos de envío específicos).
     *
     * @return float Suma total de los importes de los productos. Devuelve 0.0 si el catálogo está vacío.
     */
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