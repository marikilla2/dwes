<?php

class Autor {
    private string $nombre;

    public function __construct(string $nombre) {
        $nombreSinEspacios = trim($nombre);
        if ($nombreSinEspacios === '') {
            throw new InvalidArgumentException("El nombre del autor no puede estar vacío.");
        }
        $this->nombre = $nombreSinEspacios;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): bool {
        $nombreTrimmed = trim($nombre);
        if ($nombreTrimmed === '') {
            return false;
        }
        $this->nombre = $nombreTrimmed;
        return true;
    }
}

class Libro {
    private string $titulo;
    private float $precio;
    private Autor $autor;

    public function __construct(string $titulo, float $precio, Autor $autor) {
        $tituloSinEspacios = trim($titulo);
        if ($tituloSinEspacios === '') {
            throw new InvalidArgumentException("El título del libro no puede estar vacío.");
        }
        if ($precio < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo.");
        }
        $this->titulo = $tituloSinEspacios;
        $this->precio = $precio;
        $this->autor = $autor;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getAutor(): Autor {
        return $this->autor;
    }
}

?>