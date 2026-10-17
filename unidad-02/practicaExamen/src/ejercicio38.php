<?php
$nombre = '   Ana María   ';

$nombreSinEspacios = trim($nombre);
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
        if($nombreSinEspacios === ''){
            echo 'El usuario está vacío';
        }else{
            echo 'El usuario es válido: ' . '[' . htmlspecialchars($nombreSinEspacios) . ']';
        }
    ?>
</body>
</html>