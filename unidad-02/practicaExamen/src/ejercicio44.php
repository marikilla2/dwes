<?php
$notas = [];
$limite = 8;
for($i = 1; $i <= $limite; $i++)
{
    $notas[] = rand(1,10);
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
    <pre>
    <?php
        print_r($notas);
    ?>
    </pre>

    <?php
        echo 'Nota más alta: ' . max($notas) . '<br>';
        echo 'Nota más baja: ' . min($notas) . '<br>';
    ?>
</body>
</html>