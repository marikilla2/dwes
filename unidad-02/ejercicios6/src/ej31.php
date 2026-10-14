<?php

function calcularMedia(array $nums) : float
{
    $suma = 0;
    // for($i = 0; $i<count($nums); $i++){
    //     $suma += $nums[$i];
    // }
    foreach($nums as $num){
        $suma += $num; 
    }
    return $suma / count($nums);
}

function contarMayoresQue(array $nums, int $limite) : int
{
    $total = 0;
    foreach($nums as $numero){
        if($numero > $limite){
            $total += 1;
            echo $numero;
        }
    }
    return $total;
}

// Si calcular media estuviera vacío daría error porque es necesario un parámetro obligatorio
//Guardar los resultados de funciones en una variable fuera del html
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- lista de 5 números para probar-->
    <?php
        $array = [6,8];
        $media = calcularMedia($array);
        echo $media . " ";
        echo "Otro ejercicio: ";

        $mayorQue = contarMayoresQue($array, 7);
        echo $mayorQue;
    ?>
</body>
</html>