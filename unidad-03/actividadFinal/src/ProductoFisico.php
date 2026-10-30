<?php
class ProductoFisico extends Producto{
    private float $peso;
    private int $stock;
    const TARIFA_POR_KG = 2.0;

    #[Override]
    function __construct(string $nombre, float $precio, Categoria $categoria, float $peso, int $stock)
    {
        if($peso < 0 || $stock < 0){
            throw new InvalidArgumentException("Ni el peso ni el stock pueden ser negativos");
        }
        return parent::__construct($nombre, $precio, $categoria);
            
        $this->peso = $peso;
        $this->stock = $stock;
    }

    function getPeso(): float{
        return $this->peso;
    }

    function getStock(): int{
        return $this->stock;
    }

    function obtenerDescripcion(): string{
        return parent::obtenerDescripcion() . $this->peso . "kg";
    }

    #[Override]
    public function calcularGastosEnvio(): float
    {
        return $this->peso * self::TARIFA_POR_KG;
    }

    function reservar(int $unidades): void{
        if ($unidades <= 0 || $unidades > $this->stock) {
            throw new InvalidArgumentException("La cantidad a reservar debe ser positiva y no superar el stock disponible.");
        }

        $this->stock -= $unidades;
    }

    function reponer(int $unidades): void{
        if ($unidades <= 0) {
            throw new InvalidArgumentException("La cantidad a reponer debe ser mayor a cero.");
        }

        $this->stock += $unidades;
    }
}
?>