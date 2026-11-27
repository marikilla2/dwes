<?php
session_name('UD04ACCESO');
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php', true, 303);
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zona privada del aula</title>
</head>
<body>
    <h1>Zona privada del aula</h1>
    <p>Has iniciado sesión como
        <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>.
    </p>
    <p>Este contenido solo se muestra después de comprobar el acceso.</p>

    <form action="logout.php" method="post">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>