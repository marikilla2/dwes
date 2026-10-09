
<h2>Antes de los cambios: </h2>

<?php
    $arrayIndexado = ["Java", "C#", "Python", "Ruby", "C++"];

    echo $arrayIndexado[0] . '<br>';
    echo $arrayIndexado[4] . '<br>';

    echo count($arrayIndexado);

    $arrayIndexado[1] = "C";

    array_push($arrayIndexado, "Javascript");

    echo '<h2>Después de los cambios: </h2>';
    foreach($arrayIndexado as $array){ ?>
    
        <ul>
            <li><?= $array ?></li>
        </ul>           
<?php   }

    foreach($arrayIndexado as $indice => $valor){ ?>
        <ul>
            <li><?= $indice ?>: <?= $valor ?></li>
            <?= $indice ?>: <?= $valor ?>
        </ul>           
<?php   }

?>