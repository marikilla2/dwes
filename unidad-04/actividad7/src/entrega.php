<?php
declare(strict_types=1);

const CARPETA_ALMACEN = '/var/www/almacen-ud04';
const TAMANO_MAXIMO = 3 * 1024 * 1024;

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function validarTitulo(mixed $titulo): string
{
    if (!is_string($titulo)) {
        throw new RuntimeException('El título es obligatorio.');
    }

    $titulo = trim($titulo);
    $longitud = mb_strlen($titulo);

    if ($longitud === 0) {
        throw new RuntimeException('El título es obligatorio.');
    }

    if ($longitud < 5 || $longitud > 80) {
        throw new RuntimeException('El título debe tener entre 5 y 80 caracteres.');
    }

    return $titulo;
}

function validarMemoria(mixed $archivo): string
{
    if (!is_array($archivo)) {
        throw new RuntimeException(
            'No se ha recibido el archivo. Revisa el formulario y los límites de PHP.'
        );
    }
    
    if (!isset($archivo['error']) || !is_int($archivo['error'])) {
        throw new RuntimeException('Envía un único archivo PDF.');
    }

    if ($archivo['error'] === UPLOAD_ERR_NO_FILE) {
        throw new RuntimeException('Selecciona la memoria en PDF.');
    }

    if ($archivo['error'] === UPLOAD_ERR_INI_SIZE
        || $archivo['error'] === UPLOAD_ERR_FORM_SIZE) {
        throw new RuntimeException('El archivo supera el límite de subida del servidor.');
    }

    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('No se ha recibido el archivo completo. Reinténtalo.');
    }

    if (!isset($archivo['size'], $archivo['tmp_name'])
        || !is_int($archivo['size']) || !is_string($archivo['tmp_name'])) {
        throw new RuntimeException('Los datos del archivo no son válidos.');
    }

    if ($archivo['size'] <= 0 || $archivo['size'] > TAMANO_MAXIMO) {
        throw new RuntimeException('La memoria debe ocupar más de 0 bytes y hasta 3 MiB.');
    }

    if (!is_uploaded_file($archivo['tmp_name'])) {
        throw new RuntimeException('No se ha recibido una subida válida.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $tipo = $finfo->file($archivo['tmp_name']);

    if ($tipo !== 'application/pdf') {
        throw new RuntimeException('El archivo debe ser un PDF.');
    }

    return $archivo['tmp_name'];
}

function guardarMemoria(string $rutaTemporal, string $carpeta): string
{
    if (!is_dir($carpeta) || !is_writable($carpeta)) {
        throw new RuntimeException('El almacén no está preparado para guardar archivos.');
    }

    $nombre = bin2hex(random_bytes(16)) . '.pdf';
    $destino = $carpeta . '/' . $nombre;

    if (!move_uploaded_file($rutaTemporal, $destino)) {
        throw new RuntimeException('No se ha podido guardar la memoria.');
    }

    return $nombre;
}

$errores = ['titulo' => '', 'memoria' => '', 'general' => ''];
$titulo = '';
$nombreGuardado = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    
    if ($_POST === [] && $_FILES === [] && (int) ($_SERVER['CONTENT_LENGTH'] ?? 0) > 0) {
        $errores['general'] = 'El envío supera el tamaño máximo que admite el servidor.';
    } else {
        $tituloRecibido = $_POST['titulo'] ?? '';
        if (is_string($tituloRecibido)) {
            $titulo = trim($tituloRecibido);
        }
        
        try {
            $titulo = validarTitulo($_POST['titulo'] ?? null);
        } catch (RuntimeException $excepcion) {
            $errores['titulo'] = $excepcion->getMessage();
        }

        $rutaTemporal = '';
        try {
            $rutaTemporal = validarMemoria($_FILES['memoria'] ?? null);
        } catch (RuntimeException $excepcion) {
            $errores['memoria'] = $excepcion->getMessage();
        }

        if ($errores['titulo'] === '' && $errores['memoria'] === '') {
            try {
                $nombreGuardado = guardarMemoria($rutaTemporal, CARPETA_ALMACEN);
            } catch (RuntimeException $excepcion) {
                $errores['general'] = $excepcion->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Entrega de la memoria de prácticas</title>
</head>
<body>
    <h1>Entrega de la memoria de prácticas</h1>
    <p>Un único PDF de hasta 3 MiB.</p>

    <?php if ($errores['general'] !== ''): ?>
        <p role="alert"><?= e($errores['general']) ?></p>
    <?php endif; ?>

    <?php if ($nombreGuardado !== ''): ?>
        <section role="status">
            <p>Memoria recibida</p>
            <p>Título: <?= e($titulo) ?></p>
            <p>Guardada como: <?= e($nombreGuardado) ?></p>
        </section>
    <?php endif; ?>

    <form action="entrega.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="titulo">Título de la práctica:</label>
            <input type="text" id="titulo" name="titulo"
                   value="<?= e($titulo) ?>" minlength="5" maxlength="80" required>
            <?php if ($errores['titulo'] !== ''): ?>
                <span role="alert"><?= e($errores['titulo']) ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="memoria">Memoria (PDF):</label>
            <input type="file" id="memoria" name="memoria"
                   accept="application/pdf" required>
            <?php if ($errores['memoria'] !== ''): ?>
                <span role="alert"><?= e($errores['memoria']) ?></span>
            <?php endif; ?>
        </p>

        <button type="submit">Entregar memoria</button>
    </form>
</body>
</html>