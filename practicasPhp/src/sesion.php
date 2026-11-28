<?php
declare(strict_types=1);

//inicio y comprobación de sesión
session_name('LISTACOMPRA');
session_start();

if (!isset($_SESSION['lista']) || !is_array($_SESSION['lista'])) {
    $_SESSION['lista'] = [];
}

$producto = '';
$error = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'anadir') {
        //accion de añadir
        $valor = $_POST['producto'] ?? '';
        $producto = is_string($valor) ? trim($valor) : '';

        if ($producto === '' || mb_strlen($producto, 'UTF-8') > 30) {
            $error = 'Escribe un producto de 1 a 30 caracteres.';
        } else {
            $_SESSION['lista'][] = $producto;
            header('Location: lista.php', true, 303);
            exit;
        }
    } elseif ($accion === 'vaciar') {
        //accion de vaciar
        unset($_SESSION['lista']);
        header('Location: lista.php', true, 303);
        exit;
    } elseif ($accion === 'cerrar') {
        //accion de cerrar
        $_SESSION = [];
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        session_destroy();
        header('Location: lista.php', true, 303);
        exit;
    }
}

$lista = $_SESSION['lista'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de la compra</title>
</head>
<body>
    <h1>Lista de la compra</h1>

    <?php if ($error !== ''): ?>
        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form action="lista.php" method="post">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto"
               value="<?= htmlspecialchars($producto, ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit" name="accion" value="anadir">Añadir</button>
    </form>

    <h2>Productos (<?= count($lista) ?>)</h2>

    <?php if ($lista === []): ?>
        <p>La lista está vacía.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($lista as $item): ?>
                <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="lista.php" method="post">
        <button type="submit" name="accion" value="vaciar">Vaciar lista</button>
        <button type="submit" name="accion" value="cerrar">Cerrar sesión</button>
    </form>
</body>
</html>