<?php

include __DIR__ . "/ej22.php";

function crearAviso(Notificador $notificador, string $mensaje): string{
    return $notificador->prepararAviso($mensaje);
}

$emailNot = new NotificadorEmail();
$smsNot = new NotificadorSms();

$array = [$emailNot, $smsNot];
/*
    Porque las clases implementan la misma interfaz y eso permite que puedan usar la misma función.
    No, la interfaz aporta la función que deben implementar solamente.
    No, porque debe implementar la interfaz ya que sino es una función nueva de esa clase.
*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo crearAviso($emailNot, "La entrega termina mañana") . "<br>";
        echo crearAviso($smsNot, "La entrega termina mañana") . "<br>"; 

        foreach($array as $notificacion){
            echo crearAviso($notificacion, "La entrega termina mañana") . "<br>";
        }
    ?>
</body>
</html>