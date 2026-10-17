<?php
$tiradas = [];
$totalTiradas = 10;

for ($i = 0; $i < $totalTiradas; $i++) {
    $tiradas[] = rand(1, 6);
}

$dadoMinimo = min($tiradas);
$dadoMaximo = max($tiradas);
$sumaTotal  = array_sum($tiradas);
$cantidad   = count($tiradas);
$promedio   = $sumaTotal / $cantidad;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Historial de Tiradas de Dados</h2>

    <table border="2">
        <thead>
            <tr>
                <th>Lanzamiento Nº</th>
                <th>Resultado Dado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tiradas as $indice => $valor) {?>
                <tr>
                    <td>Lanzamiento <?= $indice + 1 ?></td>
                    <td><?= $valor ?></td>
                </tr>
            <?php } ?>

            <tr class="resumen">
                <td>Dado más bajo (min)</td>
                <td><?= $dadoMinimo ?></td>
            </tr>
            <tr class="resumen">
                <td>Dado más alto (max)</td>
                <td><?= $dadoMaximo ?></td>
            </tr>
            <tr class="resumen">
                <td>Suma total (array_sum)</td>
                <td><?= $sumaTotal ?></td>
            </tr>
            <tr class="resumen">
                <td>Valor promedio</td>
                <td><?= number_format($promedio, 2, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>