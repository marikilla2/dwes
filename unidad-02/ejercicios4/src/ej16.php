<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="number" id="numero" name="numero" min="1" max="10" required>
        <button type="submit">Calcular</button>
    </form>
    
    <?php 
    $numero = $_GET['numero'] ?? "";
    for ($i = 1; $i <= 10; $i++) { ?>
            <tr>
                <td><?= "{$numero} x {$i}" ?></td>
                <td><?= $numero * $i ?></td> <br>
            </tr>
    <?php } ?>
</body>
</html>