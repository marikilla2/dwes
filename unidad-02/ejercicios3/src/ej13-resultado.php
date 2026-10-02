<?php
    $nombre = trim($_POST['nombre'] ?? '');

    if ($nombre == ''){
        echo "Escribe un nombre antes de continuar";
    }else{
        $nombreHtml = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
        echo "Hola, " . $nombreHtml;
    }
?>