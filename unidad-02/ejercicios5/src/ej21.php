<?php
    $arrayIndexado = ["Java", "C#", "Python", "Ruby", "C++"];

    echo $arrayIndexado[0];
    echo $arrayIndexado[4];

    echo count($arrayIndexado);

    $arrayIndexado[1] = "C";

    array_push($arrayIndexado, "Javascript");

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