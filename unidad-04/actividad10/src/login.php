<?php
declare(strict_types=1);

session_name('UD04ACCESO');
session_start();

require_once __DIR__ . '/usuarios.php';

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$usuario = '';
$error = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $usuarioRecibido = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    $usuario = is_string($usuarioRecibido) ? trim($usuarioRecibido) : '';

    if (
        is_string($clave)
        && array_key_exists($usuario, $usuarios)
        && password_verify($clave, $usuarios[$usuario]['hash'])
    ) {
        session_regenerate_id(true);
        $_SESSION['usuario'] = $usuario;

        header('Location: privada.php', true, 303);
        exit;
    }

    $error = 'Usuario o contraseña incorrectos.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al aula</title>
</head>
<body>
    <h1>Acceso al aula</h1>

    <?php if ($error !== ''): ?>
        <p role="alert"><?= e($error) ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <p>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?= e($usuario) ?>" required>
        </p>
        <p>
            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" required>
        </p>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>