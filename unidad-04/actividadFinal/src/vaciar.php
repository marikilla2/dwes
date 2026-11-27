<?php
declare(strict_types=1);
session_name('UD04INCIDENCIAS');
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php', true, 303);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    unset($_SESSION['incidencias']);
}

header('Location: incidencias.php', true, 303);
exit;

?>