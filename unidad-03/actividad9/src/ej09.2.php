<?php

class Curso
{
    public function __construct(
        private string $nombre,
        private int $horas = 20
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getHoras(): int
    {
        return $this->horas;
    }
}

?>