<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function campoTexto(string $clave): string
{
    $valor = $_POST[$clave] ?? '';
    return is_string($valor) ? trim($valor) : '';
}

$categorias = [
    'perifericos' => 'Periféricos',
    'componentes' => 'Componentes',
    'almacenamiento' => 'Almacenamiento',
];

// Valores iniciales: también se utilizan para volver a rellenar el formulario.
$nombre = '';
$precioTexto = '';
$stockTexto = '';
$categoria = '';
$errores = [];
$correcto = false;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $nombre = campoTexto('nombre');
    $precioTexto = campoTexto('precio');
    $stockTexto = campoTexto('stock');
    $categoria = campoTexto('categoria');

    if ($nombre === '') {
        $errores['nombre'] = 'Escribe el nombre del producto.';
    } elseif (mb_strlen($nombre, 'UTF-8') < 3
        || mb_strlen($nombre, 'UTF-8') > 80) {
        $errores['nombre'] = 'El nombre debe tener entre 3 y 80 caracteres.';
    }

    $precio = filter_var($precioTexto, FILTER_VALIDATE_FLOAT);
    if ($precio === false || $precio < 0.01 || $precio > 99999) {
        $errores['precio'] = 'El precio debe estar entre 0,01 y 99999.';
    }

    $stock = filter_var($stockTexto, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 0, 'max_range' => 10000],
    ]);
    if ($stock === false) {
        $errores['stock'] = 'El stock debe ser un entero entre 0 y 10000.';
    }

    if (!array_key_exists($categoria, $categorias)) {
        $errores['categoria'] = 'Selecciona una categoría válida.';
    }

    $correcto = $errores === [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobar producto</title>
</head>
<body>
    <h1>Comprobar producto</h1>

    <?php if ($correcto): ?>
        <p role="status">Los datos son válidos. No se ha almacenado el producto.</p>
        <ul>
            <li>Nombre: <?= e($nombre) ?></li>
            <li>Precio: <?= number_format($precio, 2, ',', '.') ?> €</li>
            <li>Stock: <?= $stock ?></li>
            <li>Categoría: <?= e($categorias[$categoria]) ?></li>
        </ul>
    <?php endif; ?>

    <form action="producto.php" method="post" novalidate>
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"
                   required minlength="3" maxlength="80"
                   value="<?= e($nombre) ?>">
            <?php if (isset($errores['nombre'])): ?>
                <span role="alert"><?= e($errores['nombre']) ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="precio">Precio (€):</label>
            <input type="number" id="precio" name="precio"
                   required min="0.01" max="99999" step="0.01"
                   value="<?= e($precioTexto) ?>">
            <?php if (isset($errores['precio'])): ?>
                <span role="alert"><?= e($errores['precio']) ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock"
                   required min="0" max="10000" step="1"
                   value="<?= e($stockTexto) ?>">
            <?php if (isset($errores['stock'])): ?>
                <span role="alert"><?= e($errores['stock']) ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <?php foreach ($categorias as $codigo => $etiqueta): ?>
                    <option value="<?= e($codigo) ?>"
                        <?= $categoria === $codigo ? 'selected' : '' ?>>
                        <?= e($etiqueta) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errores['categoria'])): ?>
                <span role="alert"><?= e($errores['categoria']) ?></span>
            <?php endif; ?>
        </p>

        <button type="submit">Comprobar producto</button>
    </form>
</body>
</html>