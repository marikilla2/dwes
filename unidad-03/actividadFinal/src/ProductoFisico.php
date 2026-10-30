<?php
class ProductoFisico extends Producto{
    private float $peso;
    private int $stock;
    const TARIFA_POR_KG = 2.0;

    function __construct(string $nombre, float $precio, Categoria $categoria, float $peso, int $stock)
    {
        if($peso < 0 || $stock < 0){
            throw new InvalidArgumentException("Ni el peso ni el stock pueden ser negativos");
        }
        parent::__construct($nombre, $precio, $categoria);
            
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

    /**
     * Reserva una cantidad de unidades del producto descontándolas del stock disponible.
     * 
     * Comprueba que la cantidad a reservar sea mayor que cero y no supere el stock actual.
     * Si no cumple la validación, cancela la operación y no modifica el stock.
     *
     * @param int $unidades Cantidad de unidades que se desean reservar. Debe ser un entero positivo mayor que 0.
     * @return void
     * @throws InvalidArgumentException Si la cantidad es menor o igual a 0 o si supera el stock disponible.
     */

    function reservar(int $unidades): void{
        if ($unidades <= 0 || $unidades > $this->stock) {
            throw new InvalidArgumentException("La cantidad a reservar debe ser positiva y no superar el stock disponible.");
        }

        $this->stock -= $unidades;
    }

    /**
     * Incrementa las existencias del producto añadiendo unidades al stock.
     * 
     * Comprueba que la cantidad a reponer sea estricatmente positiva. Si recibe 0 o un valor
     * negativo, cancela la operación conservando el stock intacto.
     *
     * @param int $unidades Cantidad de unidades a añadir al stock. Debe ser un entero positivo.
     * @return void
     * @throws InvalidArgumentException Si la cantidad es menor o igual a 0.
     */
    function reponer(int $unidades): void{
        if ($unidades <= 0) {
            throw new InvalidArgumentException("La cantidad a reponer debe ser mayor a cero.");
        }

        $this->stock += $unidades;
    }
}
?>