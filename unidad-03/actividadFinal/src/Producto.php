<?php

abstract class Producto implements Describible{
    private string $nombre;
    private float $precio;
    private Categoria $categoria;
    private static int $totalCreados;

    function __construct(string $nombre, float $precio, Categoria $categoria)
    {
        $nombreSinEspacios = trim($nombre);
        if($nombreSinEspacios === ""){
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }

        $this->nombre = $nombreSinEspacios;
        $this->precio = $precio;
        $this->categoria = $categoria;

        $this->totalCreados++;
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