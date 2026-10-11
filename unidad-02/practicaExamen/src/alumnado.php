
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota de alumnado</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="nombre" placeholder="Introduzca su nombre">
        <input type="number" min="0" max="10" name="numero">
        <button type="submit">Enviar</button>
    </form>

<?php
    $nombre = $_GET['nombre'] ?? "";
    $nota = $_GET['numero'] ?? "";

    if (trim($nombre) && $nota !== '') {

        if ($nota >= 0 && $nota <= 10) {
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Nombre</th>';
            echo '<th>Nota</th>';
            echo '</tr>';

            if ($nota >= 5) {
                echo '<tr>';
                echo '<td>';
                echo "Está aprobado " . " - " . htmlspecialchars($nombre);
                echo '</td>';
                echo '<td>';
                echo htmlspecialchars($nota);
                echo '</td>';
                echo '</tr>';
            } else {
                echo '<tr>';
                echo '<td>';
                echo "Está suspenso " . " - " . htmlspecialchars($nombre);
                echo '</td>';
                echo '<td>';
                echo htmlspecialchars($nota);
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';

        } else {
            echo "La nota debe estar entre 0 y 10.";
        }

    } else {
        echo "Debes introducir el nombre y la nota.";
    }
?>
</body>
</html>
