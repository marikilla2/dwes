<?php

abstract class Producto implements Describible{
    private string $nombre;
    private float $precio;
    private Categoria $categoria;
    private static int $totalCreados = 0;

    /**
     * Crea un nuevo producto y valida sus datos básicos.
     *
     * @param string $nombre Nombre descriptivo del producto.
     * @param float $precio Precio base unitario (no puede ser negativo).
     * @param Categoria $categoria Categoría asociada al producto.
     * @throws InvalidArgumentException Si el nombre está vacío o el precio es inferior a 0.
     */
    public function __construct(string $nombre, float $precio, Categoria $categoria)
    {
        $nombreSinEspacios = trim($nombre);
        if($nombreSinEspacios === ""){
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }

        $this->nombre = $nombreSinEspacios;
        $this->precio = $precio;
        $this->categoria = $categoria;

        self::$totalCreados++;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getPrecio(){
        return $this->precio;
    }

    function getCategoria(){
        return $this->categoria;
    }

    #[Override]
    function obtenerDescripcion(): string
    {
        return "Producto: " . $this->nombre;
    }

    function calcularTotal(): float{
        return $this->precio + $this->calcularGastosEnvio();
    }

    public static function getTotalCreados(): int{
        return self::$totalCreados;
    }

    public abstract function calcularGastosEnvio(): float;
}

?>