<?php

interface Describible{
    function obtenerDescripcion() : string;
}

abstract class Recurso implements Describible{
    private string $titulo;
    public function __construct(string $titulo)
    {
        $tituloNuevo = trim($titulo);
        if($tituloNuevo === ""){
            throw new InvalidArgumentException("");
        }

        $this->titulo = $tituloNuevo;
    }

    function getTitulo(){
        return $this->titulo;
    }

    #[Override]
    function obtenerDescripcion(): string
    {
        return "Recurso: " . $this->titulo;
    }

    public abstract function getDiasPrestamo(): int;
}

class Libro extends Recurso{
    #[Override]
    function getDiasPrestamo(): int
    {
        return 14;
    }
}
class Revista extends Recurso{
    #[Override]
    function getDiasPrestamo(): int
    {
        return 7;
    }
}

class Aviso implements Describible{
    private string $texto;
    function __construct(string $texto)
    {
        $textoSinEspacios = trim($texto);

        if($textoSinEspacios === ""){
            throw new InvalidArgumentException("El aviso no puede estar vacío");
        }

        $this->texto = $textoSinEspacios;
    }

    #[Override]
    function obtenerDescripcion(): string
    {
        return "Aviso: " . $this->texto;
    }
}

?>