<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de lenguajes</h1>

    <h2>Antes de los cambios: </h2>

<?php
    $arrayIndexado = ["Java", "C#", "Python", "Ruby", "C++"];

    echo $arrayIndexado[0] . '<br>';
    echo $arrayIndexado[4] . '<br>';

    echo count($arrayIndexado);

    $arrayIndexado[1] = "C";

    array_push($arrayIndexado, "Javascript");

    echo '<h2>Después de los cambios: </h2>';
    echo '<h3>Valores</h3>';
    foreach($arrayIndexado as $array){ ?>
    
        <ul>
            <li><?= $array ?></li>
        </ul>           
<?php   }
    echo '<h3>Indices y valores</h3>';

    foreach($arrayIndexado as $indice => $valor){ ?>
        <ul>
            <li><?= $indice ?>: <?= $valor ?></li>
            <?= $indice ?>: <?= $valor ?>
        </ul>           
<?php   }

?>
</body>
</html>