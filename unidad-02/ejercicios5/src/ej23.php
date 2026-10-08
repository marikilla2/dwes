<?php

$respuestas = [
    "Sí",
    "No",
    "Probablemente",
    "Es posible",
    "No lo creo",
    "Sin duda",
    "Pregunta de nuevo",
    "Todo apunta a que sí"
];

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
        <input type="text" name="pregunta">
        <button type="submit">Preguntar</button>
    </form>
</body>
</html>

<?php
//Aquí comprobamos que sea el método post, quitamos espacios al principio y al final de la pregunta
//Luego sacamos el indice aleatorio del array de respuestas y sacamos una respuesta

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pregunta = trim($_POST["pregunta"]);

    if ($pregunta == "") {

        echo "Error: debes escribir una pregunta.";

    } else {

        $indice = rand(0, count($respuestas) - 1);
        $respuesta = $respuestas[$indice];

        echo "<p>Pregunta: " . htmlspecialchars($pregunta) . "</p>";
        echo "<p>Respuesta: $respuesta</p>";
    }
}

?>