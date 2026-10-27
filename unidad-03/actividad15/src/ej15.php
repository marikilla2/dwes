<?php
declare(strict_types=1);

class Categoria
{
    public function __construct(private string $nombre)
    {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}

class Articulo
{
    public const IVA = 0.21;

    private static int $totalCreados = 0;
    private float $precio;
    private Categoria $categoria;

    public function __construct(float $precio, Categoria $categoria)
    {
        $this->precio = $precio;
        $this->categoria = $categoria;
        self::$totalCreados++;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function calcularPrecioConIva(): float
    {
        return $this->precio * (1 + self::IVA);
    }

    public static function getTotalCreados(): int
    {
        return self::$totalCreados;
    }
}

$categoria = new Categoria('Periféricos');
$articulo1 = new Articulo(100.0, $categoria);
$articulo2 = new Articulo(50.0, $categoria);

$articulos = [$articulo1, $articulo2];

foreach ($articulos as $articulo) {
    echo htmlspecialchars(
        $articulo->getCategoria()->getNombre(),
        ENT_QUOTES,
        'UTF-8'
    );
    echo ': ';
    echo number_format($articulo->calcularPrecioConIva(), 2, ',', '.');
    echo ' €<br>';
}

echo 'Artículos creados: ' . Articulo::getTotalCreados();