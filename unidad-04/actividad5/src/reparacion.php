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

function obtener_post(string $campo): string {
    if (isset($_POST[$campo])) {
        return htmlspecialchars(trim($_POST[$campo]), ENT_QUOTES, 'UTF-8');
    }
    return '';
}

function validar_formulario(
    string &$equipo, 
    string &$averia, 
    string &$urgencia, 
    array &$errores, 
    array $equipos_permitidos, 
    array $urgencias_permitidas
): bool {
    if ($equipo === '') {
        $errores['equipo'] = 'Debes seleccionar un equipo.';
    } elseif (!array_key_exists($equipo, $equipos_permitidos)) {
        $errores['equipo'] = 'La opción de equipo seleccionada no es válida.';
        $equipo = '';
    }

    $longitud_averia = mb_strlen($averia);
    if ($averia === '') {
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

    return empty($errores);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipo   = obtener_post('equipo');
    $averia   = obtener_post('averia');
    $urgencia = obtener_post('urgencia');

    if (validar_formulario($equipo, $averia, $urgencia, $errores, $equipos_permitidos, $urgencias_permitidas)) {
        $exito = true;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Reparación</title>
</head>
<body>

    <h2>Formulario de Solicitud de Reparación</h2>

    <?php if ($exito): ?>
        <div>
            <h3>Solicitud comprobada</h3>
            <p><strong>Equipo:</strong> <?= $equipos_permitidos[$equipo] ?></p>
            <p><strong>Descripción de la avería:</strong> <?= nl2br($averia) ?></p>
            <p><strong>Urgencia:</strong> <?= $urgencias_permitidas[$urgencia] ?></p>
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
                    <br><strong style="color:red;"><?= $errores['equipo'] ?></strong>
                <?php endif; ?>
            </p>

            <p>
                <label for="averia">Avería (entre 15 y 500 caracteres):</label><br>
                <textarea name="averia" id="averia" rows="5" cols="40"><?= $averia ?></textarea>
                <?php if (isset($errores['averia'])): ?>
                    <br><strong style="color:red;"><?= $errores['averia'] ?></strong>
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
                    <br><strong style="color:red;"><?= $errores['urgencia'] ?></strong>
                <?php endif; ?>
            </p>

            <button type="submit">Enviar Solicitud</button>
        </form>

    <?php endif; ?>
</body>
</html>