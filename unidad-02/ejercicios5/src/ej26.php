<?php

$personas = [
    [
        "nombre" => 'Miriam',
        "altura" => '166',
        "email" => 'miriam@example.com',
    ],
    [
        "nombre" => 'Pepe',
        "altura" => '176',
        "email" => 'pepe@example.com'
    ],
    [
        "nombre" => 'Pilar',
        "altura" => '165',
        "email" => 'pilar@example.com'
    ],
    [
        "nombre" => 'Julio',
        "altura" => '170',
        "email" => 'julio@example.com'
    ],
    [
        "nombre" => 'Juan',
        "altura" => '175',
        "email" => 'juan@example.com'
    ]
];
        


$personaMasAlta = $personas[0];

foreach ($personas as $persona) {
    if ($persona['altura'] > $personaMasAlta['altura']) {
        $personaMasAlta = $persona;
    }
}

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
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Nombre</th>';
    echo '<th>Altura</th>';
    echo '<th>Email</th>';
    echo '</tr>';

    foreach ($personas as $persona) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($persona['nombre'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '<td>' . htmlspecialchars($persona['altura'], ENT_QUOTES, 'UTF-8') . ' cm</td>';
        echo '<td>' . htmlspecialchars($persona['email'], ENT_QUOTES, 'UTF-8') . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    echo "La altura más alta - su nombre: " . $personaMasAlta['altura'] . "-" . $personaMasAlta['nombre'];

    ?>
</body>
</html>