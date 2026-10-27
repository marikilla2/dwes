<?php

class Autor {
    private string $nombre;

    public function __construct(string $nombre) {
        $nombreNuevo = trim($nombre);
        if ($nombreNuevo === '') {
            throw new InvalidArgumentException("El nombre del autor no puede estar vacío.");
        }
        $this->nombre = $nombreNuevo;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): bool {
        $nombreNuevo = trim($nombre);
        if ($nombreNuevo === '') {
            return false;
        }
        $this->nombre = $nombreNuevo;
        return true;
    }
}

class Libro {
    private string $titulo;
    private float $precio;
    private Autor $autor;

    public function __construct(string $titulo, float $precio, Autor $autor) {
        $tituloNuevo = trim($titulo);
        if ($tituloNuevo === '') {
            throw new InvalidArgumentException("El título del libro no puede estar vacío.");
        }
        if ($precio < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo.");
        }
        $this->titulo = $tituloNuevo;
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

class Biblioteca {
    private array $libros = [];

    public function anadirLibro(Libro $libro): void {
        $this->libros[] = $libro;
    }

    public function getLibros(): array {
        return $this->libros;
    }

    public function contarLibros(): int {
        return count($this->libros);
    }

    public function calcularValorTotal(): float {
        $total = 0.0;
        foreach ($this->libros as $libro) {
            $total += $libro->getPrecio();
        }
        return $total;
    }
}

//Podría haberlo hecho en diferentes archivos cada clase

?>