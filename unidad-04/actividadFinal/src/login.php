<?php
declare(strict_types=1);
session_name('UD04INCIDENCIAS');
session_start();
$usuarioCorrecto = 'aula';
$hashCorrecto = '$2y$12$MahUrRDZTPQ9OAn0U3v8r.LT01PPFRZ2y5JzCcUG3UXB/RYXzdLLW';
$error = '';

function e(string $valor){
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
};

$usuario= '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $usuarioRecibido = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    $usuario = is_string($usuarioRecibido) ? trim($usuarioRecibido) : '';

    if (
    $usuario === $usuarioCorrecto
    && is_string($clave)
    && password_verify($clave, $hashCorrecto)
    ) {
        session_regenerate_id(true);
        $_SESSION['usuario'] = $usuario;

        header('Location: incidencias.php', true, 303);
        exit;
    }

    $error = 'Usuario o contraseña incorrectos.';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if ($error !== ''): ?>
        <p role="alert"><?= e($error) ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario"><br>

        <label for="contraseña">Contraseña</label>
        <input type="password" name="clave" required><br>

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>