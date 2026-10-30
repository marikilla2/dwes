<?php
require_once __DIR__ . '/Describible.php';

require_once __DIR__ . '/Categoria.php';

require_once __DIR__ . '/Producto.php';

require_once __DIR__ . '/ProductoFisico.php';
require_once __DIR__ . '/ProductoDigital.php';
require_once __DIR__ . '/Catalogo.php';

$catPerifericos = new Categoria('Periféricos');
$catPantallas   = new Categoria('Pantallas');
$catFormacion   = new Categoria('Formación');

$teclado  = new ProductoFisico('Teclado', 35.00, $catPerifericos, 0.5, 5);
$raton    = new ProductoFisico('Ratón', 20.00, $catPerifericos, 0.2, 8);
$monitor  = new ProductoFisico('Monitor', 180.00, $catPantallas, 4.0, 2);
$cursoPhp = new ProductoDigital('Curso PHP', 40.00, $catFormacion);

$catalogo = new Catalogo();
$catalogo->anadirProducto($teclado);
$catalogo->anadirProducto($raton);
$catalogo->anadirProducto($monitor);
$catalogo->anadirProducto($cursoPhp);

function describir(Describible $elemento): string
{
    return $elemento->obtenerDescripcion();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Presentación del Catálogo</title>
    
</head>
<body>

    <h1>Catálogo de Productos</h1>

    <p><strong>Cantidad de productos del catálogo:</strong> <?= $catalogo->contarProductos(); ?></p>
    <p><strong>Contador estático de productos creados:</strong> <?= Producto::getTotalCreados(); ?></p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Envío</th>
                <th>Total de una unidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catalogo->getProductos() as $producto): ?>
                <tr>
                    <td><?= htmlspecialchars($producto->getNombre()); ?></td>
                    <td><?= htmlspecialchars($producto->getCategoria()->getNombre()); ?></td>
                    <td><?= number_format($producto->getPrecio(), 2, ',', ' '); ?> €</td>
                    <td><?= number_format($producto->calcularGastosEnvio(), 2, ',', ' '); ?> €</td>
                    <td><?= number_format($producto->calcularTotal(), 2, ',', ' '); ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="4">Valor conjunto</td>
                <td><?= number_format($catalogo->calcularValorTotal(), 2, ',', ' '); ?> €</td>
            </tr>
        </tfoot>
    </table>

    <h2>Sección de Descripciones</h2>
    <ul>
        <li><strong>Categoría (Periféricos):</strong> <?= htmlspecialchars(describir($catPerifericos)); ?></li>
        <li><strong>Producto (Teclado):</strong> <?= htmlspecialchars(describir($teclado)); ?></li>
    </ul>

</body>
</html>
