<?php

$equipos_permitidos = [
    'portatil'  => 'Portátil',
    'sobremesa' => 'Ordenador de Sobremesa',
    'impresora' => 'Impresora'
];

$urgencias_permitidas = [
    'normal'  => 'Normal',
    'urgente' => 'Urgente'
];

$equipo = '';
$averia = '';
$urgencia = '';
$errores = [];
$exito = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipo = $_POST['equipo'] ?? '';
    $averia = $_POST['averia'] ?? '';
    $urgencia = $_POST['urgencia'] ?? '';

    if ($equipo === '') {
        $errores['equipo'] = 'Debes seleccionar un equipo.';
    } elseif (!array_key_exists($equipo, $equipos_permitidos)) {
        $errores['equipo'] = 'La opción de equipo seleccionada no es válida.';
        $equipo = '';
    }

    $averia_trim = trim($averia);
    $longitud_averia = mb_strlen($averia_trim);

    if ($averia_trim === '') {
        $errores['averia'] = 'La descripción de la avería es obligatoria.';
    } elseif ($longitud_averia < 15 || $longitud_averia > 500) {
        $errores['averia'] = "La avería debe tener entre 15 y 500 caracteres (longitud actual: $longitud_averia).";
    }

    if ($urgencia === '') {
        $errores['urgencia'] = 'Debes seleccionar el nivel de urgencia.';
    } elseif (!array_key_exists($urgencia, $urgencias_permitidas)) {
        $errores['urgencia'] = 'La opción de urgencia seleccionada no es válida.';
        $urgencia = '';
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
    <form action="reparacion.php" method="post">
        <label for="equipo">Equipo</label>
            <select name="equipo" id="equipo" required>
                <option value="portatil">Portatil</option>
                <option value="sobremesa">Sobremesa</option>
                <option value="impresora">Impresora</option>
            </select>
            <?php if (isset($errores['equipo'])): ?>
                <span><?= escape($errores['equipo']) ?></span>
            <?php endif; ?> 
        <label for="averia">Averia</label>
            <input type="textarea"required min="15" max="500">
        <label for="urgencia">Urgencia</label>
            <input type="radio" name="urgencia" id="urgencia" >
    </form>
    
    <!-- A partir de aquí lo he buscado, lo anterior lo he hecho yo -->

    <h2>Formulario de Solicitud de Reparación</h2>

    <?php if ($exito): ?>
        <div>
            <h3>Solicitud comprobada</h3>
            <p><strong>Equipo:</strong> <?= htmlspecialchars($equipos_permitidos[$equipo]) ?></p>
            <p><strong>Descripción de la avería:</strong> <?= nl2br(htmlspecialchars(trim($averia))) ?></p>
            <p><strong>Urgencia:</strong> <?= htmlspecialchars($urgencias_permitidas[$urgencia]) ?></p>
        </div>
    <?php else: ?>

        <form action="" method="POST" novalidate>
            
            <p>
                <label for="equipo">Equipo:</label><br>
                <select name="equipo" id="equipo">
                    <option value="">Selecciona un equipo</option>
                    <?php foreach ($equipos_permitidos as $val => $label): ?>
                        <option value="<?= $val ?>" <?= $equipo === $val ? 'selected' : '' ?>>
                            <?= $label ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($errores['equipo'])): ?>
                    <br><strong><?= htmlspecialchars($errores['equipo']) ?></strong>
                <?php endif; ?>
            </p>

            <p>
                <label for="averia">Avería (entre 15 y 500 caracteres):</label><br>
                <textarea name="averia" id="averia" rows="5" cols="40"><?= htmlspecialchars($averia) ?></textarea>
                <?php if (isset($errores['averia'])): ?>
                    <br><strong><?= htmlspecialchars($errores['averia']) ?></strong>
                <?php endif; ?>
            </p>
            
            <p>
                <label>Urgencia:</label><br>
                <?php foreach ($urgencias_permitidas as $val => $label): ?>
                    <label>
                        <input type="radio" name="urgencia" value="<?= $val ?>" <?= $urgencia === $val ? 'checked' : '' ?>>
                        <?= $label ?>
                    </label>
                <?php endforeach; ?>
                <?php if (isset($errores['urgencia'])): ?>
                    <br><strong><?= htmlspecialchars($errores['urgencia']) ?></strong>
                <?php endif; ?>
            </p>

            <button type="submit">Enviar Solicitud</button>
        </form>

    <?php endif; ?>
</body>
</html>