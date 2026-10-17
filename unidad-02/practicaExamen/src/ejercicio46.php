<?php
$entrada = $_POST['dato'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Auditoria de Entrada</h1>

    <form action="" method="post">
        <input type="text" name="dato">
        <button type="submit">Enviar</button>
    </form>
    <table border="1">
        <tr>
            <th>Dato Recibido</th>
            <th>Texto?</th>
            <th>Numerico?</th>
            <th>Digitos 0-9?</th>
            <th>Conversion Final</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($entrada) ?></td>
            <td><?= htmlspecialchars(ctype_alpha($entrada) ? 'Si' : 'No') ?></td>
            <td><?= htmlspecialchars(is_numeric($entrada) ? 'Es numero' : 'Es texto') ?></td>
            <td><?= htmlspecialchars(ctype_digit($entrada) ? 'Solo digitos' : 'No solo dígitos') ?></td>
            <td><?php if (ctype_digit($entrada)) { ?> 
                <?= (int) $entrada ?>
            <?php } else { ?>
                <?= "Dato no válido" ?>
            <?php } ?>
            </td>
        </tr>

    </table>
</body>
</html>