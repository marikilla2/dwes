<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
</head>
<body>
    <?php
$productos = [
    ["nombre" => "lapiz",
    "precio" => 2,
    "stock" => 10],
    ["nombre" => "botella",
    "precio" => 3,
    "stock" => 3],
    ["nombre" => "pelota",
    "precio" => 5,
    "stock" => 12],
    ["nombre" => "ratón",
    "precio" => 4,
    "stock" => 0],
    ["nombre" => "cargador",
    "precio" => 7,
    "stock" => 8],
];

$totalProd = count($productos);
$sumaPrecios = 0;

echo '<table border="1">';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>Precio</th>';
echo '<th>Stock</th>';
echo '<th>Estado</th>';
echo '</tr>';

foreach ($productos as $producto) {

    if ($producto['stock'] == 0) {
        $estado = "Producto agotado";
    } else if ($producto['stock'] < 5) {
        $estado = "Últimas unidades de producto";
    } else {
        $estado = "Disponible";
    }

    echo '<tr>';
    echo '<td>' . htmlspecialchars($producto['nombre']) . '</td>';
    echo '<td>' . $producto['precio'] . ' €</td>';
    echo '<td>' . $producto['stock'] . '</td>';
    echo '<td>' . $estado . '</td>';
    echo '</tr>';

    $sumaPrecios += $producto['precio'];
}

echo '</table>';

$precioMedio = $sumaPrecios / $totalProd;

echo '<p>Total de productos: ' . $totalProd . '</p>';
echo '<p>Precio medio: ' . $precioMedio . ' €</p>';
?>

</body>
</html>

