<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <select name="formulario" id="1">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
        <button type="submit">Enviar formulario</button>
    </form>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $formulario = $_GET['formulario'] ?? '';
        switch($formulario){
            case 1:
                echo "lunes";
                break;
            case 2:
                echo "martes";
                break;
            case 3:
                echo "miércoles";
                break;
            case 4:
                echo "jueves";
                break;
            case 5:
                echo "viernes";
                break;
            case 6:
                echo "sábado";
                break;
            case 7:
                echo "domingo";
                break;
            default:
                echo "día inválido";
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $formulario = (int) $_GET['formulario'] ?? '';

        $mensaje = match ($formulario) {
            1 => 'lunes',
            2 => 'martes',
            3 => 'miercoles',
            4 => 'jueves',
            5 => 'viernes',
            6,7 => 'Es fin de semana.',
            default => 'Día no válido',
        };
    }  
    echo $mensaje;
?>