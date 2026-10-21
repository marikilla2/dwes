<?php
declare(strict_types=1);
require_once __DIR__ . '/index.php';


class Libro
{
    public string $titulo = "";
    public string $autor = "";
    public int $paginas = 0;

    function obtenerFicha(): string
    {
        return $this->titulo . " " . $this->autor . " " . $this->paginas;
    }

}

// La clase es Libro en este caso, this representa la propia instancia del objeto actual.

?>