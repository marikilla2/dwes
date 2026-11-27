<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$tipo = '';
$error = '';
$nombreGuardado = '';
$carpeta = '/var/www/almacen-ud04';
$permitidos = ['image/jpeg' => 'jpg', 'image/png' => 'png'];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $archivo = $_FILES['foto'] ?? null;

    if (!is_array($archivo) || !isset($archivo['error']) || !is_int($archivo['error'])) {
        $error = 'No se ha recibido el archivo.';
    } elseif ($archivo['error'] === UPLOAD_ERR_NO_FILE) {
        $error = 'Selecciona una foto.';
    } elseif ($archivo['error'] !== UPLOAD_ERR_OK) {
        $error = 'Ha fallado la subida. Revisa el tamaño.';
    } elseif ($archivo['size'] <= 0 || $archivo['size'] > 1 * 1024 * 1024) {
        $error = 'La foto debe ocupar como máximo 1 MiB.';
    }

    if ($error === '') {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $tipo = $finfo->file($archivo['tmp_name']);

        if (!array_key_exists($tipo, $permitidos)) {
            $error = 'Solo se admiten imágenes JPEG o PNG.';
        }
    }

    if ($error === '') {
        $nombre = bin2hex(random_bytes(16)) . '.' . $permitidos[$tipo];
        $destino = $carpeta . '/' . $nombre;

        if (move_uploaded_file($archivo['tmp_name'], $destino)) {
            $nombreGuardado = $nombre;
        } else {
            $error = 'No se ha podido guardar la foto.';
        }
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
    <h1>Foto de perfil</h1>
    <p>JPEG o PNG, como máximo 1 MiB.</p>

    <?php if ($error !== ''): ?>
        <p role="alert"><?= e($error) ?></p>
    <?php endif; ?>

    <?php if ($nombreGuardado !== ''): ?>
        <p>Foto guardada como: <?= e($nombreGuardado) ?></p>
    <?php endif; ?>
    
    <form action="avatar.php" method="post" enctype="multipart/form-data">
        <input type="file" name="foto" accept="image/jpeg,image/png">
        <button type="submit">Subir foto</button>
    </form>
</body>
</html>