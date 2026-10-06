<?php
// Puede ser tanto ['enviar'] como ['numero']

$enviado = isset($_GET['enviar']);
$error = '';

if ($enviado)
{
    $numero = $_GET['numero'] ?? '';

    if (is_string($numero) || !ctype_digit($numero))
    {
        $error = 'Introduce un número válido';
    }
    else
    {
        $valor = (int) $numero;

        if ($valor < 1 || $valor > 10)
        {
            $error = 'El número debe estar entre 1 y 10';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16 profesor</title>
</head>
<body>

    <h1></h1>

    <form action="" method="get">
        <label>Número del 1 al 10</label>
        <input type="number" name="numero" min="1" max="10" step="1" required>
        <button type="submit" name="enviar">Enviar</button>
    </form>

    <?php if ($error !== '') { ?>

        <p><?= $error; ?></p>

    <?php } elseif ($enviado) { ?>

        <h2>Tabla de multiplicar del número <?= $valor ?></h2>

        <table>
            <thead>
                <tr>
                    <th>Operación</th>
                    <th>Resultado</th>
                </tr>
            </thead>

            <tbody>
                <?php for ($i = 1; $i <= 10; $i++) { ?>

                    <tr>
                        <td><?= $valor ?> x <?= $i ?></td>
                        <td><?= $valor * $i ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    <?php } ?>

</body>
</html>