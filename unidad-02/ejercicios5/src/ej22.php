<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Aquí se van guardando los valores en el array en cada posición
    $aleatorios = [];
    $total = 20;
    
    $suma = 0;

    for ($i = 0; $i < $total; $i++) {

        $aleatorio = rand(0, 99);

        $aleatorios[$i] = $aleatorio;

    }
    $menor = $aleatorios[0];
    $mayor = $aleatorios[0];
    // Aquí se van guardando los valores en distintas variables previamente definidas
    foreach($aleatorios as $aleatorio){
        echo "<ul>";
        echo $aleatorio;
        echo "</ul>";

        if ($aleatorio > $mayor) {
            $mayor = $aleatorio;
        }

        if ($aleatorio < $menor) {
            $menor = $aleatorio;
        }
        $suma += $aleatorio;
        
    }
    $media = $suma/$total;

    //$mediaIntervalo = $media >= $mayor || $media <= $menor;
    echo "El número mayor es: $mayor <br>";
    echo "El número menor es: $menor <br>";
    echo "La media de los números es: $media";

    ?>
</body>
</html>

