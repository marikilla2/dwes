<?php
//Aquí no se guardan los valores en el array, solo se imprime el último
$tope = 20;
$aleatorios = [];

for($i = 0; $i <= $tope; $i++){
    $aleatorios = rand(0,99); ?>
    <ul>
        <?= $aleatorios ?>
    </ul>
<?php

}
echo "Separación entre ejercicios"

?>
<?php
//Aquí se van guardando los valores en el array en cada posición
$aleatorios = [];
$tope = 20;
$menor = 100;
$mayor = 0;
$suma = 0;

for ($i = 0; $i < $tope; $i++) {

    $aleatorio = rand(0, 99);

    $aleatorios[$i] = $aleatorio;

}

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
$media = $suma/$tope;
echo "El número mayor es: $mayor <br>";
echo "El número menor es: $menor <br>";
echo "La media de los números es: $media";

?>