<?php

function saludar(string $nombre): string
{
    return 'Hola ' . $nombre;
}
//Definir una función es darle forma y llamarla es ejecutarla, 
//un parámetro sería nombre y un argumento sería de saludar Ana por ejemplo
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li> <?= htmlspecialchars(saludar('Ana'), ENT_QUOTES, 'UTF-8') ?></li>
        <li> <?= htmlspecialchars(saludar('Samuel'), ENT_QUOTES, 'UTF-8') ?></li>
        <li> <?= htmlspecialchars(saludar('Alba'), ENT_QUOTES, 'UTF-8') ?></li>
    </ul>
</body>
</html>