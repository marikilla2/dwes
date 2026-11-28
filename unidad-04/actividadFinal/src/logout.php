<?php
declare(strict_types=1);
session_name('UD04INCIDENCIAS');
session_start();

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Location: incidencias.php', true, 303);
    exit;
}

$_SESSION = [];

$p = session_get_cookie_params();
setcookie(session_name(), '', time() - 3600, $p['path'], $p['domain'], $p['secure'], $p['httponly']);

session_destroy();

header('Location: login.php', true, 303);
exit;