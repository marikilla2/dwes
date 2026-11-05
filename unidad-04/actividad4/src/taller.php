<?php

function campoTexto(string $clave) : string {
    $valor = $_POST[$clave] ?? '';
    return trim($valor);
}

$nombre = '';
$correo = '';
$edad = '';
$errores = [];

if(($_SERVER['REQUEST_METHOD'] ?? '') === 'POST'){
    $nombre = campoTexto('nombre');
    $correo = campoTexto('correo');
    $edad = campoTexto('edad');

    if ($nombre === '') {
        $errores['nombre'] = 'Escribe el nombre del producto';
    } else if (mb_strlen($nombre, 'UTF-8') < 3 || mb_strlen($nombre, 'UTF-8') > 80) {
        $errores['nombre'] = 'El nombre debe tener entre 3 y 80 caracteres';
    }

    if($correo === ''){
        $errores['correo'] = 'Escribe el correo del producto';
    } 

    $edad = filter_var($stockTexto, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 16, 'max_range' => 99]
    ]);
    if ($edad === false) {
        $errores['stock'] = 'La edad debe ser un entero entre 16 y 99.';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="taller.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required value="<?= $nombre ?>">
        <?php if (isset($errores['nombre'])): ?>
                <span><?= $errores['nombre'] ?></span>
            <?php endif; ?>
        <label for="correo">Correo:</label>
        <input type="text" name="correo" id="correo" value="<?= $correo ?>">
        <?php if (isset($errores['correo'])): ?>
                <span><?= $errores['correo'] ?></span>
            <?php endif; ?>
        <label for="edad">Edad:</label>
        <input type="number" min="16" max="99" value="<?= $edad ?>">
        <?php if (isset($errores['edad'])): ?>
                <span><?= $errores['edad'] ?></span>
            <?php endif; ?>
    </form>
</body>
</html>