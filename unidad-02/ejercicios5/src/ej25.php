<?php
    $alturas = [
        'Ana' => 150,
        'Veronica' => 160,
        'Luisa' => 165,
        'Marcos' => 170,
        'Julian' => 167,
    ];

    $suma = 0;
    $total = count(array_keys($alturas));

    foreach($alturas as $nombre => $altura){
        echo '<p>'. htmlspecialchars($altura) .'</p>';
        $suma += $altura;
    }
    $alturaMedia = $suma / $total;
    echo $alturaMedia;
?>