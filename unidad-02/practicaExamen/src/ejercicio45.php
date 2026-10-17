<?php
    $edad = $_POST['edad'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" min="0" max="120" name="edad" placeholder="Introduce tu edad">
        <button type="submit">Enviar</button>
    </form>
    <?php
        if ($edad !== '') {

        if (!ctype_digit($edad)) {
            echo "Error: Introduce solo números enteros.";
        } else {

            $edadF = (int) $edad;

            if ($edadF > 120) {
                echo "Error: La edad debe estar entre 0 y 120.";
            } else {
                echo "Edad registrada correctamente: " . $edadF;
                }
            }
    }
    ?>
</body>
</html>