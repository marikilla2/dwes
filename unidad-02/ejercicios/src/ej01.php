<?php 
    $parrafo1 = "Esta es la asignatura de desarrollo en entorno servidor";
    $parrafo2 = "Este es otro párrafo de prueba";
    $parrafo3 = "Este es el último párrafo de la actividad correspondiente";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera Actividad</title>
</head>
<body>
    <?php echo $parrafo1?> <br>
    <?= 'Este es otro párrafo de prueba' ?> <br>
    <?php print $parrafo3?>
</body>
</html>