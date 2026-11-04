<?php

function campoTexto(string $clave) : string {
    $valor = $_POST[$clave] ?? '';
    return trim($valor);
}

// Array con el catálogo de categorías disponibles
$categoriasDisponibles = [
    'perifericos' => 'Periféricos',
    'componentes' => 'Componentes',
    'almacenamiento' => 'Almacenamiento'
];

$nombre = '';
$precioTexto = '';
$stockTexto = '';
$categoriaSeleccionada = '';
$errores = [];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $nombre = campoTexto('nombre');
    $precioTexto = campoTexto('precio');
    $stockTexto = campoTexto('stock');
    $categoriaSeleccionada = campoTexto('categoria');

    // Validación Nombre
    if ($nombre === '') {
        $errores['nombre'] = 'Escribe el nombre del producto';
    } else if (mb_strlen($nombre, 'UTF-8') < 3 || mb_strlen($nombre, 'UTF-8') > 80) {
        $errores['nombre'] = 'El nombre debe tener entre 3 y 80 caracteres';
    }

    // Validación Precio
    $precio = filter_var($precioTexto, FILTER_VALIDATE_FLOAT);
    if ($precio === false) {
        $errores['precio'] = 'El precio debe ser un número decimal válido';
    } else if ($precio < 0.01 || $precio > 99999) {
        $errores['precio'] = 'El precio debe estar entre 0.01 y 99999';
    }

    // Validación Stock
    $stock = filter_var($stockTexto, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 0, 'max_range' => 10000]
    ]);
    if ($stock === false) {
        $errores['stock'] = 'El stock debe ser un entero entre 0 y 10000.';
    }

    // Validación Categoría
    if (!array_key_exists($categoriaSeleccionada, $categoriasDisponibles)) {
        $errores['categoria'] = 'Selecciona una categoría válida.';
    }

    // Si no hay errores, redirigimos
    if (empty($errores)) {
        header('Location: resultado.php', true, 303);
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Producto</title>
</head>
<body>
    <form action="ej3.php" method="post">
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>">
            <?php if (isset($errores['nombre'])): ?>
                <span><?= $errores['nombre'] ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" value="<?= htmlspecialchars($precioTexto) ?>">
            <?php if (isset($errores['precio'])): ?>
                <span><?= $errores['precio'] ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?= htmlspecialchars($stockTexto) ?>">
            <?php if (isset($errores['stock'])): ?>
                <span><?= $errores['stock'] ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="categoria">Categoría</label>
            <select name="categoria" id="categoria">
                <option value="">Selecciona una categoría</option>
                <?php foreach ($categoriasDisponibles as $codigo => $etiqueta): ?>
                    <option value="<?= $codigo ?>" <?= $categoriaSeleccionada === $codigo ? 'selected' : '' ?>>
                        <?= $etiqueta ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errores['categoria'])): ?>
                <span><?= $errores['categoria'] ?></span>
            <?php endif; ?>
        </p>

        <button type="submit">Comprobar productos</button>
    </form>
</body>
</html>