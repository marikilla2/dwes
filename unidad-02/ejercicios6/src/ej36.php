<?php
function duplicar(int $numero): int {
    return $numero * 2;
}
$triplicar = function (int $numero): int {
    return $numero * 3;
};

$incremento = 4;

$sumarIncremento = fn(int $numero): int => $numero + $incremento;

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

        $funcion = 'duplicar';
        $numero = 5;

        echo "Duplicar: " . $funcion($numero) . "<br>";
        
        echo "Triplicar: " . $triplicar($numero) . "<br>";
        
        echo "Sumar incremento: " . $sumarIncremento($numero) . "<br>";
    ?>
</body>
</html>