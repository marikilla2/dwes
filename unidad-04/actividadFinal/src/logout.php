<?php
declare(strict_types=1);
session_name('UD04INCIDENCIAS'); 
session_start();

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    $_SESSION = [];
    session_destroy();
    setcookie('UD04ACCESO', '', time() - 3600, '/');
    header('Location: incidencias.php', true, 303);
    exit;
}
session_destroy();

header('Location: login.php', true, 303);
exit;
?>