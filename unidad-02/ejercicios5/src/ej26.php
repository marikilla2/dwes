<?php

$personas = [[
        "nombre" => 'Miriam',
        "altura" => '166',
        "email" => 'miriam@gmail.com',
    ],
    [
        "nombre" => 'Pepe',
        "altura" => '176',
        "email" => 'pepe@gmail.com'
    ],
    [
        "nombre" => 'Pilar',
        "altura" => '165',
        "email" => 'pilar@gmail.com'
    ],
    [
        "nombre" => 'Julio',
        "altura" => '170',
        "email" => 'julio@gmail.com'
    ],
    [
        "nombre" => 'Juan',
        "altura" => '175',
        "email" => 'juan@gmail.com'
    ]
];
        

echo '<table border="1">';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>Altura</th>';
echo '<th>Email</th>';
echo '</tr>';

foreach ($personas as $persona) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($persona['nombre']) . '</td>';
    echo '<td>' . htmlspecialchars($persona['altura']) . ' cm</td>';
    echo '<td>' . htmlspecialchars($persona['email']) . '</td>';
    echo '</tr>';
}

echo '</table>';

$personaMasAlta = $personas[0];

foreach ($personas as $persona) {
    if ($persona['altura'] > $personaMasAlta['altura']) {
        $personaMasAlta = $persona;
    }
}

echo $personaMasAlta['altura'] . " " . $personaMasAlta['nombre'];

?>