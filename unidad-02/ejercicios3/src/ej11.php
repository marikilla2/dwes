<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        Introduce un número correspondiente a una edad <input type="number" id="1" name="edad">
        <button type="submit">Enviar edad</button>
    </form>
</body>

</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $edad = $_POST['edad'] ?? "";
        $edadHtml = htmlspecialchars($edad, ENT_QUOTES, "UTF-8");

        if ($edad <= 3 && $edad >= 0) {
            echo "es un bebé";
        } else if ($edad > 3 && $edad < 12) {
            echo "es un niño o niña";
        } else if ($edad > 12 && $edad < 18) {
            echo "es un adolescente";
        } else if ($edad >= 18 && $edad < 67) {
            echo "es un adulto";
        } else if ($edad >= 67) {
            echo "es jubilado";
        } else {
            echo "la edad es negativa o no es válida";
        }
    }
?>