<?php
declare(strict_types=1);

$idiomas = [
    'es' => 'Español',
    'en' => 'Inglés',
    'fr' => 'Francés',
];

if(($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $valor = $_POST['idioma'] ?? '';

    if (is_string($valor) && array_key_exists($valor, $idiomas)) {
        setcookie('idioma', $valor, [
            'expires'  => time() + 30 * 24 * 60 * 60,   // 30 días
            'path'     => '/',
            'httponly' => true,
        ]);
    }

    header('Location: idioma.php', true, 303);
    exit;

}

$idioma = $_COOKIE['idioma'] ?? 'es';
if (!is_string($idioma) || !array_key_exists($idioma, $idiomas)) {
    $idioma = 'es';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Idioma</title>
</head>
<body>
    <h1>Preferencia de idioma</h1>

    <p>Idioma actual: <?= htmlspecialchars($idiomas[$idioma], ENT_QUOTES, 'UTF-8') ?></p>

    <form action="idioma.php" method="post">
        <label for="idioma">Idioma:</label>
        <select id="idioma" name="idioma">
            <?php foreach ($idiomas as $clave => $texto): ?>
                <option value="<?= htmlspecialchars($clave, ENT_QUOTES, 'UTF-8') ?>"
                    <?= $idioma === $clave ? 'selected' : '' ?>>
                    <?= htmlspecialchars($texto, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>