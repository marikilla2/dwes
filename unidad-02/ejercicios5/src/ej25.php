<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $alturas = [
        'Ana' => 150,
        'Veronica' => 160,
        'Luisa' => 165,
        'Marcos' => 180,
        'Julian' => 170,
    ];

    $suma = 0;
    $total = count(array_keys($alturas));

    echo '<table border=1>';
    echo '<tr>';
    echo '<td>Nombre</td>';
    echo '<td>Altura</td>';
    echo '</tr>';

    echo '<tr>';

    foreach($alturas as $nombre => $altura){
        echo '<td>'. htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') .'</td>';
        echo '<td>'. htmlspecialchars($altura, ENT_QUOTES, 'UTF-8') .'</td>';
        $suma += $altura;
        echo '</tr>';
    }

    
    echo '</table>';
    $alturaMedia = $suma / $total;
    echo "La altura media es de: " . $alturaMedia;
    ?>
</body>
</html>
