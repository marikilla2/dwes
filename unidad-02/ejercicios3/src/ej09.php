<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="" method="post">
        Número <input type="number" id="numero" name="numero">
        <button type="submit">Enviar</button>
    </form>
    
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = (int) $_POST['numero'];
        if($numero > 0){
        echo "el numero es positivo";
        }else if($numero < 0){
            echo "el numero es negativo";
        }else{
            echo "el numero es cero";
        }
    }  
    
?>