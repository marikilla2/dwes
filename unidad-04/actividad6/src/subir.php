<?php
declare(strict_types=1);

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function guardarImagen(array $archivo, string $carpeta): string
{
    if (!isset($archivo['error']) || !is_int($archivo['error'])) {
        throw new RuntimeException('El formato de la subida no es válido.');
    }

    if ($archivo['error'] === UPLOAD_ERR_NO_FILE) {
        throw new RuntimeException('Selecciona una imagen.');
    }
    //Importante el tamaño del archivo
    if ($archivo['error'] === UPLOAD_ERR_INI_SIZE
        || $archivo['error'] === UPLOAD_ERR_FORM_SIZE) {
        throw new RuntimeException('El archivo supera el límite de subida.');
    }

    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('No se ha recibido el archivo completo. Reinténtalo.');
    }

    // A partir de aquí necesitamos un tamaño entero y una ruta temporal.
    if (!isset($archivo['size'], $archivo['tmp_name'])
        || !is_int($archivo['size']) || !is_string($archivo['tmp_name'])) {
        throw new RuntimeException('Los datos del archivo no son válidos.');
    }
    //Importante tamaño entre los valores permitidos
    if ($archivo['size'] <= 0 || $archivo['size'] > 2 * 1024 * 1024) {
        throw new RuntimeException('La imagen debe ocupar más de 0 bytes y hasta 2 MiB.');
    }

    if (!is_uploaded_file($archivo['tmp_name'])) {
        throw new RuntimeException('No se ha recibido una subida válida.');
    }

    //Importante el tipo de fichero
    $permitidos = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $tipo = $finfo->file($archivo['tmp_name']);

    if ($tipo === false || !array_key_exists($tipo, $permitidos)) {
        throw new RuntimeException('Solo se admiten imágenes JPEG o PNG.');
    }

    if (!is_dir($carpeta) || !is_writable($carpeta)) {
        throw new RuntimeException('El almacén no está preparado para guardar archivos.');
    }

    $nombre = bin2hex(random_bytes(16)) . '.' . $permitidos[$tipo];
    $destino = $carpeta . '/' . $nombre;

    if (!move_uploaded_file($archivo['tmp_name'], $destino)) {
        throw new RuntimeException('No se ha podido guardar la imagen.');
    }

    return $nombre;
}

$error = '';
$nombreGuardado = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    try {
        $archivo = $_FILES['imagen'] ?? null;
        if (!is_array($archivo)) {
            throw new RuntimeException(
                'No se ha recibido el archivo. Revisa el formulario y los límites de PHP.'
            );
        }
        $nombreGuardado = guardarImagen($archivo, '/var/www/almacen-ud04');
    } catch (RuntimeException $excepcion) {
        $error = $excepcion->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir imagen de producto</title>
</head>
<body>
    <h1>Subir imagen de producto</h1>
    <p>JPEG o PNG, hasta 2 MiB.</p>

    <?php if ($error !== ''): ?>
        <p role="alert"><?= e($error) ?></p>
    <?php endif; ?>

    <?php if ($nombreGuardado !== ''): ?>
        <p role="status">Imagen guardada como: <?= e($nombreGuardado) ?></p>
    <?php endif; ?>

    <form action="subir.php" method="post" enctype="multipart/form-data">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen"
               accept="image/jpeg,image/png" required>
        <button type="submit">Subir imagen</button>
    </form>
</body>
</html>