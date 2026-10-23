<?php
declare(strict_types=1);
require_once __DIR__ . '/index.php';


class Libro
{
    private string $titulo;
    private string $autor;
    private int $paginas;

    function __construct(string $titulo, string $autor, int $paginas = 0)
    {
        $tituloLimpio = trim($titulo);
        $autorLimpio = trim($autor);

        if($tituloLimpio === ''){
            throw new InvalidArgumentException("El titulo no puede estar vacío");
        }
        if($autorLimpio === ''){
            throw new InvalidArgumentException("El autor no puede estar vacío");
        }
        if($paginas < 0){
            throw new InvalidArgumentException("Las páginas no pueden ser negativas");
        }

        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->paginas = $paginas;
        
    }

    public function getTitulo(): string{
        return $this->titulo;
    }
        
    public function getAutor(): string {
        return $this->autor;
    }
        
    public function getPaginas(): int{
        return $this->paginas;
    }

    public function obtenerFicha(): string
    {
        return $this->titulo . " " . $this->autor . " " . $this->paginas;
    }

}

// La clase es Libro en este caso, this representa la propia instancia del objeto actual.

?>