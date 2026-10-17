<?php

$cadena = "Aprender PHP 8 es fundamental para backend PHP";

$contienePHP = str_contains($cadena,'PHP');

$empieza = str_starts_with($cadena, 'Aprender');

$termina = str_ends_with($cadena, '.php');

$posicion = strpos($cadena, 'PHP');

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

        echo 'Cadena inicial: ' . htmlspecialchars($cadena, ENT_QUOTES, 'UTF-8') . '<br>';
        echo 'Contiene PHP: ' . $contienePHP . '<br>';
        echo 'Empieza por Aprender: ' . $empieza . '<br>';
        echo 'Termina por .php: ' . ($termina ? 'True' : 'False') . '<br>';

        if($posicion !== false){
            echo 'La primera posición en la cadena es la siguiente: ' . $posicion . '<br>';
        }else{
            echo 'No se ha encontrado en la cadena inicial';
        }
        echo 'La posicion en la cadena es: ' . $posicion . '<br>';
    ?>
</body>
</html>