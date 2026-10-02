<?php
    $puntos_inic = 40;
    $puntos_inic += 15;
    $puntos_inic -= 8;
    
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
    echo "<p>El saldo final es: $puntos_inic </p>";
    echo '<p>';
    var_dump($puntos_inic >= 40 && $puntos_inic <= 50);
    echo '</p>';
    echo '<p>';
    var_dump($puntos_inic < 30 || $puntos_inic > 45);
    echo '</p>';
    ?>
</body>
</html>