<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function campoTexto(string $clave): string
{
    $valor = $_POST[$clave] ?? '';
    return is_string($valor) ? trim($valor) : '';
}

$opciones = [
    'infantil'  => 'Infantil',
    'colegio'   => 'Colegio',
    'instituto' => 'Instituto',
    'unisup'    => 'Universidad o Grado Superior',
];

$opcion = '';
$errores = [];
$enviado = ($_SERVER['REQUEST_METHOD'] ?? '') === 'POST';

if ($enviado) {
    $opcion = campoTexto('opciones');

    if (!array_key_exists($opcion, $opciones)) {
        $errores['opciones'] = 'Selecciona una opción válida.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario sencillo</title>
</head>
<body>
    <?php if ($enviado && $errores === []): ?>
        <p>Has elegido: <?= e($opciones[$opcion]) ?></p>
    <?php endif; ?>

    <form action="prueba.php" method="post">
        <label for="opciones">Nivel de estudios:</label>
        <select name="opciones" id="opciones">
            <option value="">Elige una opción</option>
            <?php foreach ($opciones as $clave => $texto): ?>
                <option value="<?= e($clave) ?>" <?= $opcion === $clave ? 'selected' : '' ?>>
                    <?= e($texto) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errores['opciones'])): ?>
            <span><?= e($errores['opciones']) ?></span>
        <?php endif; ?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>