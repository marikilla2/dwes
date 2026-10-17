<?php
$monto = -1284.678;
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
        $numero = abs($monto);
        echo $numero;
    ?>
    <p>
    <?php
        echo round($numero, 2);
    ?>
    </p>
    <p>
    <?php
        echo floor($numero);
    ?>
    </p>
    <p>
    <?php
        echo ceil($numero);
    ?>
    </p>
    <?php
        echo number_format($numero, 2, ',', '.');
    ?>
</body>
</html>