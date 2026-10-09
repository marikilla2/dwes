<?php

$respuestas = ["Sí","No","Probablemente","Es posible","No lo creo","Sin duda","Pregunta de nuevo","Todo apunta a que sí"];

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
        <button type="submit" name="enviado">Preguntar</button>
    </form>
</body>
</html>

<?php
    $enviado = $_SERVER['REQUEST_METHOD'] === 'POST';

    if ($enviado) {
        $pregunta = $_POST['pregunta'] ?? '';
        $preguntaSinEspacios = trim($pregunta);

        if ($preguntaSinEspacios !== '') {
            $respuestasNum = rand(0, count($respuestas) - 1);
            $respuesta = $respuestas[$respuestasNum];
            //Se puede hacer con un switch pero no es recomendable, mejor hacer la línea anterior
        } else {
            $error = "Debes escribir una pregunta.";
        }
    }

    if ($enviado) {
        if (isset($error)) {
            echo "<p>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>";
        } else {
            echo "<p>Tu pregunta: " . htmlspecialchars($preguntaSinEspacios, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p>Respuesta: " . htmlspecialchars($respuesta, ENT_QUOTES, 'UTF-8') . "</p>";
        }
    }
    ?>

</body>
</html>