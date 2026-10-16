<?php
function duplicar(int $numero): int {
    return $numero * 2;
}

$funcion = 'duplicar';
$numero = 5;

$triplicar = function (int $numero): int {
    return $numero * 3;
};

$incremento = 4;

$sumarIncremento = fn(int $numero): int => $numero + $incremento;
//$sumar = fn(int $numero) : int => $numero + $incremento;
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
        $duplicar = $funcion($numero);
        $tri = $triplicar($numero);
        $sumar = $sumarIncremento($numero);
        echo "Duplicar: " . $duplicar . "<br>";
        
        echo "Triplicar: " . $tri . "<br>";

        echo "Sumar incremento: " . $sumar . "<br>";
    ?>
</body>
</html>