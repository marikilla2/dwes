<?php
$ciudad = 'Málaga';

$ciudadLength = strlen($ciudad);
$ciudadmbLength = mb_strlen($ciudad, 'UTF-8');

$mayus = strtoupper($ciudad);
$mayus2 = mb_strtoupper($ciudad);

$tresPrimeros = mb_substr($ciudad, 0, 3, 'UTF-8');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo 'Ciudad: ' . htmlspecialchars($ciudad) . '<br>';

        echo 'Longitud: ' . htmlspecialchars($ciudadLength) . '<br>';

        echo 'Longitud en mb: ' . htmlspecialchars($ciudadmbLength) . '<br>';

        echo 'Ciudad mayúscula: ' . htmlspecialchars($mayus) . '<br>';

        echo 'Ciudad mayúscula: ' . htmlspecialchars($mayus2) . '<br>';

        echo 'Ciudad con 3 primeras letras: ' .htmlspecialchars($tresPrimeros) . '<br>';
    ?>
</body>
</html>