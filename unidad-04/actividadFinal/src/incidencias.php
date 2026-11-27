<?php
declare(strict_types=1);
session_name('UD04INCIDENCIAS');
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php', true, 303);
    exit;
}

$tamanos = [
    'normal'     => ['texto' => 'Normal',     'valor' => '1rem'],
    'grande'     => ['texto' => 'Grande',     'valor' => '1.25rem'],
    'muy-grande' => ['texto' => 'Muy grande', 'valor' => '1.5rem'],
];

$tamano = $_COOKIE['ud04_incidencias_tamano'] ?? 'normal';
if (!is_string($tamano) || !array_key_exists($tamano, $tamanos)) {
    $tamano = 'normal';
}

$incidencias = $_SESSION['incidencias'] ?? [];
if (!is_array($incidencias)) {
    $incidencias = [];
}

$categorias = [
    'hardware' => 'Hardware',
    'software' => 'Software',
    'red'      => 'Red',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
</head>
<body style="font-size: <?= $tamanos[$tamano]['valor'] ?>">
    <h1>Incidencias del aula</h1>

    <p>Usuario: <strong><?= htmlspecialchars((string) $_SESSION['usuario'], ENT_QUOTES, 'UTF-8') ?></strong></p>
    <p>Número de incidencias: <?= count($incidencias) ?></p>

    <p><a href="nueva.php">Registrar una incidencia</a></p>

    <?php if ($incidencias === []): ?>
        <p>Todavía no hay incidencias registradas</p>
    <?php else: ?>
        <?php foreach ($incidencias as $incidencia): ?>
            <article>
                <h2><?= htmlspecialchars($incidencia['equipo'], ENT_QUOTES, 'UTF-8') ?></h2>
                <p>Categoría: <?= htmlspecialchars($categorias[$incidencia['categoria']] ?? $incidencia['categoria'], ENT_QUOTES, 'UTF-8') ?></p>
                <p><?= htmlspecialchars($incidencia['descripcion'], ENT_QUOTES, 'UTF-8') ?></p>
                <p>Impide trabajar: <?= $incidencia['impide'] ? 'Sí' : 'No' ?></p>

                <?php if ($incidencia['imagen'] !== ''): ?>
                    <img src="<?= htmlspecialchars($incidencia['imagen'], ENT_QUOTES, 'UTF-8') ?>"
                         alt="Imagen de la incidencia" width="250">
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>

    <hr>

    <form action="vaciar.php" method="post">
        <button type="submit">Vaciar incidencias</button>
    </form>

    <form action="logout.php" method="post">
        <button type="submit">Cerrar sesión</button>
    </form>

    <form action="preferencias.php" method="post">
        <label for="tamano">Tamaño de letra:</label>
        <select id="tamano" name="tamano">
            <?php foreach ($tamanos as $clave => $datos): ?>
                <option value="<?= htmlspecialchars($clave, ENT_QUOTES, 'UTF-8') ?>"
                    <?= $tamano === $clave ? 'selected' : '' ?>>
                    <?= htmlspecialchars($datos['texto'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="accion" value="guardar">Guardar</button>
        <button type="submit" name="accion" value="restablecer">Restablecer</button>
    </form>
</body>
</html>