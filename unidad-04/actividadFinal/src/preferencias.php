<?php
declare(strict_types=1);
session_name('UD04INCIDENCIAS');
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php', true, 303);
    exit;
}

$tamanos = [
    'normal'     => '1rem',
    'grande'     => '1.25rem',
    'muy-grande' => '1.5rem',
];

$opciones = [
    'expires'  => time() + 30 * 24 * 60 * 60,
    'path'     => '/',
    'secure'   => false,
    'httponly' => true,
    'samesite' => 'Lax',
];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'guardar') {
        $tamano = $_POST['tamano'] ?? '';

        if (is_string($tamano) && array_key_exists($tamano, $tamanos)) {
            setcookie('ud04_incidencias_tamano', $tamano, $opciones);
        }
    } elseif ($accion === 'restablecer') {
        $opciones['expires'] = time() - 3600;
        setcookie('ud04_incidencias_tamano', '', $opciones);
    }
}

header('Location: incidencias.php', true, 303);
exit;

?>
