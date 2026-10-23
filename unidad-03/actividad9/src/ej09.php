<?php

class Curso
{
    private string $nombre;
    private int $horas;

    public function __construct(string $nombre, int $horas = 20)
    {
        $this->nombre = $nombre;
        $this->horas = $horas;
    }

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