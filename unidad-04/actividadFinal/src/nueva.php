<?php
declare(strict_types=1);
session_name('UD04INCIDENCIAS');
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php', true, 303);
    exit;
}
$permitidos = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
$tamanoMaximo = 50 * 1024 * 1024;
$categorias = [
    'hardware' => 'Hardware',
    'software' => 'Software',
    'red'      => 'Red',
];

$equipo = '';
$categoria = '';
$descripcion = '';
$impide = false;
$errores = [];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $valor = $_POST['equipo'] ?? '';
    $equipo = is_string($valor) ? trim($valor) : '';

    $valor = $_POST['categoria'] ?? '';
    $categoria = is_string($valor) ? trim($valor) : '';

    $valor = $_POST['descripcion'] ?? '';
    $descripcion = is_string($valor) ? trim($valor) : '';

    $impide = ($_POST['impide'] ?? '') === '1';

    $longitud = mb_strlen($equipo, 'UTF-8');
    if ($longitud < 2 || $longitud > 30) {
        $errores['equipo'] = 'El equipo debe tener entre 2 y 30 caracteres.';
    }

    if (!array_key_exists($categoria, $categorias)) {
        $errores['categoria'] = 'Selecciona una categoría válida.';
    }

    $longitud = mb_strlen($descripcion, 'UTF-8');
    if ($longitud < 10 || $longitud > 300) {
        $errores['descripcion'] = 'La descripción debe tener entre 10 y 300 caracteres.';
    }

    $archivo = $_FILES['imagen'] ?? null;
    $hayImagen = false;
    $tipo = '';

    if (!is_array($archivo) || !isset($archivo['error']) || !is_int($archivo['error'])) {
        $errores['imagen'] = 'No se ha recibido correctamente la imagen.';
    } elseif ($archivo['error'] === UPLOAD_ERR_NO_FILE) {
        // Sin imagen: es válido, la incidencia se registra sin ella
    } elseif ($archivo['error'] !== UPLOAD_ERR_OK) {
        $errores['imagen'] = 'La imagen no se ha recibido completa. Revisa su tamaño.';
    } elseif ($archivo['size'] <= 0 || $archivo['size'] > $tamanoMaximo) {
        $errores['imagen'] = 'La imagen debe ocupar como máximo 50 MiB.';
    } else {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $tipo = (string) $finfo->file($archivo['tmp_name']);

        if (!array_key_exists($tipo, $permitidos)) {
            $errores['imagen'] = 'Solo se admiten imágenes JPEG o PNG.';
        } else {
            $hayImagen = true;
        }
    }

    $rutaImagen = '';

    if ($errores === [] && $hayImagen) {
        $nombre = bin2hex(random_bytes(16)) . '.' . $permitidos[$tipo];

        if (move_uploaded_file($archivo['tmp_name'], __DIR__ . '/uploads/' . $nombre)) {
            $rutaImagen = 'uploads/' . $nombre;
        } else {
            $errores['imagen'] = 'No se ha podido guardar la imagen.';
        }
    }

    if ($errores === []) {
        if (!isset($_SESSION['incidencias']) || !is_array($_SESSION['incidencias'])) {
            $_SESSION['incidencias'] = [];
        }

        $_SESSION['incidencias'][] = [
            'equipo'      => $equipo,
            'categoria'   => $categoria,
            'descripcion' => $descripcion,
            'impide'      => $impide,
            'imagen'      => $rutaImagen,
        ];

        header('Location: incidencias.php', true, 303);
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva incidencia</title>
</head>
<body>
    <h1>Nueva incidencia</h1>
    <p><a href="incidencias.php">Volver al listado</a></p>

    <form action="nueva.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="equipo">Equipo:</label>
            <input type="text" id="equipo" name="equipo" minlength="2" maxlength="30" required
                   value="<?= htmlspecialchars($equipo, ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errores['equipo'])): ?>
                <span role="alert"><?= htmlspecialchars($errores['equipo'], ENT_QUOTES, 'UTF-8') ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <?php foreach ($categorias as $clave => $texto): ?>
                    <option value="<?= htmlspecialchars($clave, ENT_QUOTES, 'UTF-8') ?>"
                        <?= $categoria === $clave ? 'selected' : '' ?>>
                        <?= htmlspecialchars($texto, ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errores['categoria'])): ?>
                <span role="alert"><?= htmlspecialchars($errores['categoria'], ENT_QUOTES, 'UTF-8') ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="4" cols="50" minlength="10" maxlength="300" required><?= htmlspecialchars($descripcion, ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (isset($errores['descripcion'])): ?>
                <span role="alert"><?= htmlspecialchars($errores['descripcion'], ENT_QUOTES, 'UTF-8') ?></span>
            <?php endif; ?>
        </p>

        <p>
            <label>
                <input type="checkbox" name="impide" value="1" <?= $impide ? 'checked' : '' ?>>
                Impide trabajar
            </label>
        </p>

        <p>
            <label for="imagen">Imagen (opcional, JPEG o PNG, máximo 50 MiB):</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg,image/png">
            <?php if (isset($errores['imagen'])): ?>
                <span role="alert"><?= htmlspecialchars($errores['imagen'], ENT_QUOTES, 'UTF-8') ?></span>
            <?php endif; ?>
        </p>

        <button type="submit">Registrar incidencia</button>
    </form>
</body>
</html>