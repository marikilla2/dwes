<?php

class Producto{
    private string $nombre;
    private float $precio;

    function __construct(string $nombre, float $precio)
    {
        $nombreNuevo = trim($nombre);
        if($nombreNuevo === ""){
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }
        if($precio < 0){
            throw new InvalidArgumentException("El precio no puede ser negativo");
        }
        $this->nombre = $nombreNuevo;
        $this->precio = $precio;
    }

    function getNombre() : string
    {
        return $this->nombre;
    }
    function getPrecio() : float
    {
        return $this->precio;
    }

    public function setPrecio(float $nuevoPrecio) : bool
    {
        if ($nuevoPrecio < 0) {
            throw new InvalidArgumentException("El nuevo precio no puede ser negativo");
        }
        if ($nuevoPrecio < 0) {
            return false;
        }
        $this->precio = $nuevoPrecio;
        return true;
    }

    public function calcularImporte(int $unidades) : float
    {
        if($unidades < 0){
            throw new InvalidArgumentException("No puede haber unidades negativas");
        }
        return $this->precio * $unidades;
    }
}

?>