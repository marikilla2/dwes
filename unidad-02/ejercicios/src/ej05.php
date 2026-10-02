<?php 
    $numero = 10; 
    $texto = '10';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Resultado de comparación: </p>
    <?php
    $numero = 10; 
    $texto = '10';
    var_dump($numero); echo " El primer numero es un digito";
    var_dump($texto); echo " El segundo texto es un numero";
    var_dump($numero == $texto); echo " La primera comparacion es verdadera";
    var_dump($numero === $texto); echo " La segunda comparacion es falsa";
    var_dump($numero != $texto); echo " La tercera comparacion es falsa";
    var_dump($numero !== $texto); echo " La cuarta comparacion es verdadera";
    ?>
    
</body>
</html>