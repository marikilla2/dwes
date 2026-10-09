<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $frutas = ['pera', 'manzana', 'naranja'];

    $cantidad = count($frutas);

    for($i = 0; $i<$cantidad; $i++){
        echo '<pre>';
        var_dump($frutas[$i]);
        echo '</pre>';
    }

    print_r($frutas); echo '<br>';

    $frutas[2] = 'naranja';
    $frutas[] = 'plátano';

    array_push($frutas, 'kiwi');

    //$ultimoIndice = $frutas[$cantidad - 1];
    array_pop($frutas);
    //Ponemos count($frutas para que se actualice el valor de frutas)
    echo $frutas[count($frutas) - 1]; echo '<br>';

    print_r($frutas); echo '<br>';

    $peraPresente = in_array('pera', $frutas, true);

    echo $peraPresente ? 'pera presente' : 'pera no presente'; echo '<br>';

    $copia = $frutas;

    $copiaOrd = sort($copia);

    print_r($copiaOrd); echo '<br>';
    print_r($frutas); echo '<br>';

    unset($frutas[1]);

    $claves = array_keys($frutas);
    $cantidad = count($frutas);

    print_r($claves); echo '<br>';
    print_r($cantidad); echo '<br>';

    foreach ($frutas as $indice => $fruta) {
        echo '<p>';
        echo $indice . ':' . $fruta;
        echo '</p>';
    }

    $frutasNuevas = array_values($frutas);

    print_r($frutasNuevas);

    ?>
</body>
</html>

