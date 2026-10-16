<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 35</title>
</head>
<body>
    <?php

        function sumarVarios(int ...$numeros) : int
        {
            $suma = 0;
            for($i = 0; $i < count($numeros); $i++){
                $suma += $numeros[$i];
            }
            
            return $suma;
        }

        echo "Sin argumentos: " . sumarVarios() . "<br>";
        echo "Con uno: " . sumarVarios(7) . "<br>";
        echo "Con tres: " . sumarVarios(7, 5, 3) . "<br>";

        function multiplicar(int $a, int $b = 5): int
        {
            return $a * $b;
        }

        $factores = [2,4];
        $num = multiplicar(...$factores);
        echo 'Resultado de multiplicar: ' . $num;

        echo '<br>';

        echo "Otro resultado con parametro predefinido: " . multiplicar(a: 3);
    ?>
</body>
</html>