<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>
<body>
    <h1>Suma de un intervalo</h1>
    <form action="" method="get">
        Inicio <input type="number" min="1" max="100" name="inicio">
        Fin <input type="number" min="1" max="100" name="fin">
        <button type="submit">Calcular</button>
    </form>
    <?php
        if (isset($_GET['inicio']) && isset($_GET['fin'])){
            $inicio = (int)($_GET['inicio']);
            $fin = (int)($_GET['fin']);
            $acumulador = 0;
            if($inicio > $fin){
                echo "Proceso inválido";
            }else{
                for($inicio; $inicio<=$fin; $inicio++){
                    $acumulador = $acumulador + $inicio;
                }
            } ?>

            <li>
                <ul>el numero acumulado es: <?= $acumulador ?></ul>
            </li>
            <?php  
        };
      
    ?>
</body>
</html>