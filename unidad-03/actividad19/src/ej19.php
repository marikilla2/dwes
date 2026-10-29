<?php

abstract class Producto {
    private string $nombre;
    private float $precio;

    public function __construct(string $nombre, float $precio) {
        $nombreLimpio = trim($nombre);
        if ($nombreLimpio === '') {
            throw new InvalidArgumentException("El nombre del producto no puede estar vacío.");
        }
        if ($precio < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo.");
        }
        $this->nombre = $nombreLimpio;
        $this->precio = $precio;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    final public function getPrecio(): float { //No se puede reescribir o sobreescribir una clase final y no se puede heredar de ella si es una clase
        return $this->precio;
    }

    public function obtenerDescripcion(): string {
        return "Producto: " . $this->nombre;
    }

    public function calcularTotal(): float {
        return $this->precio + $this->calcularGastosEnvio();
    }

    abstract public function calcularGastosEnvio(): float;
}

class ProductoFisico extends Producto {
    private float $peso;

    //Pongo un constructor porque recibe una propiedad del padre desde du constructor
    public function __construct(string $nombre, float $precio, float $peso) { 
        if ($peso <= 0) {
            throw new InvalidArgumentException("El peso debe ser un valor positivo.");
        }
        parent::__construct($nombre, $precio);
        $this->peso = $peso;
    }

    public function getPeso(): float {
        return $this->peso;
    }

    public function obtenerDescripcion(): string {
        return parent::obtenerDescripcion() . " / Peso: " . $this->peso . " kg";
    }

    public function calcularGastosEnvio(): float {
        return $this->peso * 2.0;
    }
}

final class ProductoDigital extends Producto {
    public function obtenerDescripcion(): string {
        return parent::obtenerDescripcion() . " / Descarga digital";
    }

    public function calcularGastosEnvio(): float {
        return 0.0;
    }
}

?>