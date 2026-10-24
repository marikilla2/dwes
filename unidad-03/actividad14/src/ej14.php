<?php

class Reserva{
    private string $cliente;
    private static int $totalCreadas = 0;

    public function __construct(string $cliente)
    {
        $clienteSinEspacios = trim($cliente);
        if($clienteSinEspacios === ''){
            throw new InvalidArgumentException("El nombre del cliente no puede estar vacío");
        }

        $this->cliente = $clienteSinEspacios;
        self::$totalCreadas++;
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public static function getTotalCreadas(): int
    {
        return self::$totalCreadas;
    }
}

?>