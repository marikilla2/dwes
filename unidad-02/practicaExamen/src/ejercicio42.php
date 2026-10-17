<?php
$comentario = "Hola, mi nombre es <b>Carlos</b>.\nMe encanta el curso de PHP.\n\n<script>alert('xss');</script>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
    <?php
        echo nl2br(htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8'));
    ?>
    </p>
</body>
</html>