<?php
$nombre = "Ana";
$apellido1 = "Perez";
$apellido2 = "Nuñez";

$correo = "unejemplo@gmail.com";
$año_nac = 2000;
$telefono = "678293814";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="2">

        <td>Dato</td>
        <td>Valor</td>

        <tr>
            <td>Nombre: </td>
            <td><?php echo $nombre ?></td>
        </tr>
        <tr>
            <td>Apellido 1: </td>
            <td><?php echo $apellido1 ?></td>
        </tr>
        <tr>
            <td>Apellido 2: </td>
            <td><?php echo $apellido2 ?></td>
        </tr>
        <tr>
            <td>Correo: </td>
            <td><?php echo $correo ?></td>
        </tr>
        <tr>
            <td>Año Nacimiento: </td>
            <td><?php echo $año_nac ?></td>
        </tr>
        <tr>
            <td>Teléfono: </td>
            <td><?php echo $telefono ?></td>
        </tr>

    </table>

</body>

</html>