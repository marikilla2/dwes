<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 20 PHP</title>
</head>
<body>
    <form action="" method="get">
        Base <input type="number" step="1" name="base">
        Exponente <input type="number" step="1" name="exponente">
        <button type="submit">Calcular</button>
    </form>

    <?php
        if(isset($_GET['base']) && isset($_GET['exponente'])){
            $base = (int)($_GET['base']);
            $exp = (int)($_GET['exponente']);
            $suma = 1;

            if($exp < 0){
                echo "el exponente no puede ser un número negativo";
            }

            for($i = 0; $i < $exp; $i++){
                $suma = $suma * $base;
            }
            echo "la acumulación de números es: " . $suma;
        }
    ?>
</body>
</html>