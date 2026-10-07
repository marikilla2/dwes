<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio de break y continue</h1>
    <ul>
    <?php
        for($i = 1; $i<= 20; $i++){
            if($i===12){
                break;
            } 
            if($i%3 === 0){
                continue;
            }
            ?>
            
            <li><?= $i ?></li>
    <?php }
    ?>
    </ul>

    <!-- No se muestran ni el 3 ni el 12 porque cuando 
     llega a ese punto continúa o se lo salta del bucle 
    El break se pone antes porque es más importante-->
</body>
</html>