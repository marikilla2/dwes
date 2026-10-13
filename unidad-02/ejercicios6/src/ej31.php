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
        $array = [6,8];
        $variable = calcularMedia($array);
        echo $variable . " ";
        echo "Otro ejercicio: ";

        $var = contarMayoresQue($array, 7);
        echo $var;
    ?>
</body>
</html>