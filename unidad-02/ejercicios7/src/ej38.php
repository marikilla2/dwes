<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cadena = ' María Muñoz ';
        $cadenaLimpia = trim($cadena);
        echo $cadena . '<br>';

        echo strlen($cadenaLimpia) . '<br>';
        echo mb_strlen($cadenaLimpia, 'UTF-8') . '<br>';
        echo mb_strtoupper($cadenaLimpia) . '<br>';
        echo mb_strtolower($cadenaLimpia) . '<br>';
        echo mb_substr($cadenaLimpia, 0) . '<br>';

        echo strtoupper('Hola PHP'); 

        echo strtolower('Hola PHP'); 

        echo substr('ABC12345', 0, 3);

        echo substr('ABC12345', 3); 

        echo substr('ABC12345', -2); 
    ?>
    <pre> <?=  $cadena ?> </pre>
    <pre> <?= trim($cadena) ?> </pre>
    <pre> <?= ltrim($cadena) ?> </pre>
    <pre> <?= rtrim($cadena) ?> </pre>


</body>
</html>