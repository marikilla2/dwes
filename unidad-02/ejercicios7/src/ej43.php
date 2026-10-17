<?php
$tiradas = [];
for ($i = 0; $i < 10; $i++) {
    $tiradas[] = rand(1, 6);
}

$menor = min($tiradas);
$mayor = max($tiradas);

$suma = 0;
foreach ($tiradas as $tirada) {
    $suma += $tirada;
}

$media = $suma / count($tiradas);

$todasEnRango = true;
foreach ($tiradas as $val) {
    if ($val < 1 || $val > 6) {
        $todasEnRango = false;
        break;
    }
}

$mediaEnRango = ($media >= $menor && $media <= $mayor);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tiradas de Dado en PHP</title>
</head>
<body>

    <h2>Tiradas del dado (1 a 6)</h2>
    <ul>
        <?php foreach ($tiradas as $tirada): ?>
            <li><?= $tirada ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Estadísticas</h2>
    <p><strong>Tirada menor:</strong> <?= $menor ?></p>
    <p><strong>Tirada mayor:</strong> <?= $mayor ?></p>
    <p><strong>Suma total:</strong> <?= $suma ?></p>
    <p><strong>Media:</strong> <?= number_format($media, 2, ',', '.') ?></p>

    <h2>Comprobaciones</h2>
    <ul>
        <li>
            ¿Todas las tiradas están entre 1 y 6?: 
            <strong><?= $todasEnRango ? 'Sí' : 'No' ?></strong>
        </li>
        <li>
            ¿La media (<?= number_format($media, 2, ',', '.') ?>) está entre el menor (<?= $menor ?>) y el mayor (<?= $mayor ?>)?: 
            <strong><?= $mediaEnRango ? 'Sí' : 'No' ?></strong>
        </li>
    </ul>

    <!-- 
    Explicación del uso de min() y max():
    En este ejercicio podemos utilizar directamente min() y max() porque almacenamos
    todas las tiradas dentro de una estructura de datos tipo array ($tiradas). Las funciones
    nativas min() y max() de PHP aceptan un array como argumento para evaluar de forma
    automática todos sus elementos de una sola vez.

    En cambio, en ejercicios anteriores donde se evaluaban valores de forma individual en cada
    iteración o variables sueltas sin estructurar en un array, era necesario realizar comparaciones
    manuales (mediante estructuras 'if') dentro del bucle para ir guardando el valor extremo
    conforme se procesaba cada dato.
    -->

</body>
</html>