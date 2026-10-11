
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de números</title>
</head>
<body>

    <form action="" method="get">
        <input type="number" name="inicio" placeholder="Número inicial" required>
        <input type="number" name="fin" placeholder="Número final" required>
        <button type="submit">Generar</button>
    </form>

    <?php
    $inicio = $_GET['inicio'] ?? '';
    $fin = $_GET['fin'] ?? '';

    if ($inicio !== '' && $fin !== '') {

        if ($inicio < $fin) {

            for ($i = $inicio; $i <= $fin; $i++) {
                echo '<p>' . $i . '</p>';
            }

        } elseif ($inicio > $fin) {

            for ($i = $inicio; $i >= $fin; $i--) {
                echo '<p>' . $i . '</p>';
            }

        } else {
            echo '<p>' . $inicio . '</p>';
        }

    }
    ?>

</body>
</html>
