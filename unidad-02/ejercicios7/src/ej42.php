<?php
$numeroOriginal = 1234.567;
$redondeado = round($numeroOriginal, 2);
$formateado = number_format($numeroOriginal, 2, ',', '.');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pruebas Matemáticas en PHP</title>
</head>
<body>

    <h2>1. Función abs()</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>abs(-8)</td>
                <td><?= abs(-8) ?></td>
            </tr>
            <tr>
                <td>abs(8)</td>
                <td><?= abs(8) ?></td>
            </tr>
            <tr>
                <td>abs(0)</td>
                <td><?= abs(0) ?></td>
            </tr>
        </tbody>
    </table>

    <h2>2. Funciones pow() y sqrt()</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>pow(2, 3) (2³)</td>
                <td><?= pow(2, 3) ?></td>
            </tr>
            <tr>
                <td>pow(7, 0) (7⁰)</td>
                <td><?= pow(7, 0) ?></td>
            </tr>
            <tr>
                <td>sqrt(81) (√81)</td>
                <td><?= sqrt(81) ?></td>
            </tr>
        </tbody>
    </table>

    <h2>3. Función round()</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>round(7.46)</td>
                <td><?= round(7.46) ?></td>
            </tr>
            <tr>
                <td>round(7.56)</td>
                <td><?= round(7.56) ?></td>
            </tr>
            <tr>
                <td>round(7.456, 2)</td>
                <td><?= round(7.456, 2) ?></td>
            </tr>
        </tbody>
    </table>

    <h2>4. Funciones floor() y ceil()</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>floor(7.9)</td>
                <td><?= floor(7.9) ?></td>
            </tr>
            <tr>
                <td>ceil(7.9)</td>
                <td><?= ceil(7.9) ?></td>
            </tr>
            <tr>
                <td>floor(-7.1)</td>
                <td><?= floor(-7.1) ?></td>
            </tr>
            <tr>
                <td>ceil(-7.1)</td>
                <td><?= ceil(-7.1) ?></td>
            </tr>
        </tbody>
    </table>

    <p><strong>¿Por qué redondear hacia abajo un negativo no equivale a quitarle los decimales?</strong></p>
    <p>
        La función <code>floor()</code> redonda hacia el entero <strong>menor o igual</strong> en la recta numérica (hacia la izquierda).<br>
        En números positivos como <code>7.9</code>, la izquierda es <code>7</code> (coincide con quitar decimales).<br>
        Sin embargo, en un número negativo como <code>-7.1</code>, el entero menor inmediato hacia la izquierda es <code>-8</code>.<br>
        Si le quitáramos los decimales obtendríamos <code>-7</code>, lo cual sería redondear hacia arriba (<code>ceil()</code>), ya que <code>-7</code> es mayor que <code>-7.1</code>.
    </p>

    <h2>5. Formato y Comprobación de Tipos</h2>
    <p>Variable original: <code>$numeroOriginal = <?= $numeroOriginal ?></code></p>

    <table border="1">
        <thead>
            <tr>
                <th>Función / Operación</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>round($numeroOriginal, 2)</td>
                <td><?= $redondeado ?></td>
            </tr>
            <tr>
                <td>number_format($numeroOriginal, 2, ',', '.')</td>
                <td><?= $formateado ?></td>
            </tr>
        </tbody>
    </table>

    <h3>Verificación con var_dump():</h3>
    <pre>
<?php
var_dump($redondeado);
var_dump($formateado);
?>
    </pre>

</body>
</html>