<?php

class Categoria implements Describible{

    private string $nombre;

    public function __construct(string $nombre)
    {
        $nombreSinEspacios = trim($nombre);
        if($nombreSinEspacios === ""){
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }
        $this->nombre = $nombreSinEspacios;
    }

    function getNombre(){
        return $this->nombre;
    }
    #[Override]
    function obtenerDescripcion(): string
    {
        return "Categoria: " . $this->nombre;
    }
}

?>