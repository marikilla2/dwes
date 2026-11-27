<?php
session_name('UD04ACCESO');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    session_destroy();
    setcookie('UD04ACCESO', '', time() - 3600, '/');
}

header('Location: login.php', true, 303);
exit;

?>