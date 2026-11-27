<?php
declare(strict_types=1);

session_name('UD04CARRITO');
session_start();

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function euros(int $centimos): string
{
    return number_format($centimos / 100, 2, ',', '.') . ' €';
}

const MAX_UNIDADES = 10;

// Catálogo del servidor: los precios, en céntimos (enteros), evitan errores de redondeo.
$productos = [
    'teclado' => ['nombre' => 'Teclado USB',       'precio' => 2000],
    'raton'   => ['nombre' => 'Ratón óptico',      'precio' => 1250],
    'memoria' => ['nombre' => 'Memoria USB 64 GB', 'precio' => 990],
];

// El carrito relaciona identificador => cantidad. Si no existe o no es un array, empieza vacío.
if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$error = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'anadir') {
        $id = $_POST['producto'] ?? '';

        if (!is_string($id) || !array_key_exists($id, $productos)) {
            $error = 'El producto no es válido.';
        } else {
            $cantidad = $_SESSION['carrito'][$id] ?? 0;

            if (!is_int($cantidad) || $cantidad >= MAX_UNIDADES) {
                $error = 'No se pueden añadir más de ' . MAX_UNIDADES . ' unidades de un producto.';
            } else {
                $_SESSION['carrito'][$id] = $cantidad + 1;
                header('Location: sesion.php', true, 303);
                exit;
            }
        }
    } elseif ($accion === 'vaciar') {
        unset($_SESSION['carrito']);
        header('Location: sesion.php', true, 303);
        exit;
    } else {
        $error = 'La acción no es válida.';
    }
}
$lineas = [];
$total = 0;

foreach ($_SESSION['carrito'] as $id => $cantidad) {
    if (!is_string($id) || !array_key_exists($id, $productos) || !is_int($cantidad) || $cantidad < 1) {
        continue;
    }

    $subtotal = $productos[$id]['precio'] * $cantidad;
    $total += $subtotal;

    $lineas[] = [
        'nombre'   => $productos[$id]['nombre'],
        'precio'   => $productos[$id]['precio'],
        'cantidad' => $cantidad,
        'subtotal' => $subtotal,
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito</title>
</head>
<body>
    <h1>Tienda</h1>

    <?php if ($error !== ''): ?>
        <p role="alert"><?= e($error) ?></p>
    <?php endif; ?>

    <h2>Catálogo</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $id => $producto): ?>
                <tr>
                    <td><?= e($producto['nombre']) ?></td>
                    <td><?= e(euros($producto['precio'])) ?></td>
                    <td>
                        <form action="sesion.php" method="post">
                            <input type="hidden" name="producto" value="<?= e($id) ?>">
                            <button type="submit" name="accion" value="anadir">Añadir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Carrito</h2>
    <?php if ($lineas === []): ?>
        <p>El carrito está vacío</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lineas as $linea): ?>
                    <tr>
                        <td><?= e($linea['nombre']) ?></td>
                        <td><?= e(euros($linea['precio'])) ?></td>
                        <td><?= $linea['cantidad'] ?></td>
                        <td><?= e(euros($linea['subtotal'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td><?= e(euros($total)) ?></td>
                </tr>
            </tfoot>
        </table>

        <form action="sesion.php" method="post">
            <button type="submit" name="accion" value="vaciar">Vaciar carrito</button>
        </form>
    <?php endif; ?>
</body>
</html>