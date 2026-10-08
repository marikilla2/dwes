<?php
$arrays = [];

for($i = 0; $i < 50; $i++){
    $array = rand(0, 1);
    
    if(rand(0, 1) == 0){
        $arrays[] = 'A';
    }else{
        $arrays[] = 'B';
    }
}

$arrayAsociativo = [
    'A' => 0,
    'B' => 0
];

foreach($arrays as $valor){
    if ($valor == 'A') {
        $arrayAsociativo['A']++;
    } else {
        $arrayAsociativo['B']++;
    } 
}

$total = $arrayAsociativo['A'] + $arrayAsociativo['B'];

echo "Total: " . $total;

if ($total == 50) {
    echo "La suma de los contadores es 50.";
} else {
    echo "Error: la suma no es 50.";
}

?>