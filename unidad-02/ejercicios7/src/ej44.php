<?php
// 1. Definición de la lista con los valores requeridos
$lista = [
    20,
    '20',
    20.5,
    '12.5',
    'hola',
    false,
    null,
    ['PHP', 'JavaScript']
];


$cadenasTest = ['20', '0', '-3', '12.5', '', '12,5'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobación de Tipos y Funciones Numéricas en PHP</title>
</head>
<body>

    <h2>1. Recorrido del Array con gettype(), var_dump() y Comprobaciones de Tipo</h2>

    <?php foreach ($lista as $indice => $valor): ?>
        <h3>Elemento <?= $indice + 1 ?></h3>
        
        <p><strong>Tipo (gettype):</strong> <?= gettype($valor) ?></p>

        <p><strong>Contenido (var_dump):</strong></p>
        <pre><?php var_dump($valor); ?></pre>

        <p><strong>Evaluación de funciones de comprobación:</strong></p>
        <ul>
            <li>is_int(): <strong><?= is_int($valor) ? 'Sí' : 'No' ?></strong></li>
            <li>is_float(): <strong><?= is_float($valor) ? 'Sí' : 'No' ?></strong></li>
            <li>is_string(): <strong><?= is_string($valor) ? 'Sí' : 'No' ?></strong></li>
            <li>is_bool(): <strong><?= is_bool($valor) ? 'Sí' : 'No' ?></strong></li>
            <li>is_array(): <strong><?= is_array($valor) ? 'Sí' : 'No' ?></strong></li>
            <li>is_null(): <strong><?= is_null($valor) ? 'Sí' : 'No' ?></strong></li>
            <li>is_numeric(): <strong><?= is_numeric($valor) ? 'Sí' : 'No' ?></strong></li>
        </ul>
        <hr>
    <?php endforeach; ?>

    <h2>2. Comparativa entre is_numeric() y ctype_digit()</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Cadena</th>
                <th>is_numeric()</th>
                <th>ctype_digit()</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cadenasTest as $cadena): ?>
                <tr>
                    <td><code><?= var_export($cadena, true) ?></code></td>
                    <td><?= is_numeric($cadena) ? 'Sí' : 'No' ?></td>
                    <td><?= ctype_digit($cadena) ? 'Sí' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>3. Explicación teórica</h2>

    <ul>
        <li>
            <strong>¿Por qué <code>'20'</code> es numérico pero no tiene tipo <code>int</code>?</strong><br>
            Su tipo de dato real es <code>string</code> (cadena de texto) porque está delimitado por comillas. La función <code>is_numeric()</code> evalúa si el <em>contenido</em> de la cadena puede interpretarse como un número válido para realizar operaciones matemáticas, dando <code>true</code>. Sin embargo, su tipo subyacente según el sistema de tipos de PHP sigue siendo una cadena de texto, no un entero (<code>int</code>).
        </li>
        <li>
            <strong>¿Por qué <code>'-3'</code> es numérico pero no está formado exclusivamente por dígitos?</strong><br>
            <code>is_numeric()</code> reconoce <code>'-3'</code> como un número válido porque el signo menos (<code>-</code>) forma parte de la notación de números enteros negativos. En cambio, <code>ctype_digit()</code> únicamente devuelve <code>true</code> si **todos y cada uno** de los caracteres del string son dígitos numéricos simples (del <code>0</code> al <code>9</code>). Como el guion <code>-</code> es un carácter de puntuación/signo y no un dígito puro, <code>ctype_digit('-3')</code> devuelve <code>false</code>.
        </li>
    </ul>

</body>
</html>