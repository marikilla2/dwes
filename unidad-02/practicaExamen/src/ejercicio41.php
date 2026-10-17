<?php

$entrada = " PHP ,  JavaScript ,Python ,  HTML5 ";

$array = explode(',', $entrada);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
    <?php

        $nuevoArray = [];
    
        foreach($array as $ar){ ?>
            <?php
            $nuevoArray[] = trim($ar);
        ?>
            <li><?= htmlspecialchars(trim($ar), ENT_QUOTES, 'UTF-8') ?></li>
        <?php }
        $texto = implode(' | ', $nuevoArray);

        echo 'Salida unida: ' . $texto;
    ?>
    </ul>
</body>
</html>