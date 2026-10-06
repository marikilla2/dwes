<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>
<body>
    <?php
        //$numero = 8;
        $numero = 3;
        while($numero <= 5) {
            echo $numero;
        }
        //$numero = 8;
        $numero = 3;
        do{
            echo $numero;
        }while($numero<=5);
    ?>
</body>
    <!--    
    Explicación:
    Cuando $numero=8:
        -No entra en el bucle while porque la condición de entrada es que el $número sea de valor 5 o menor,al ser 8 no entra y no se imprime nada.
        -Entra en el bucle do-while porque ese bucle primero hace el do y luego comprueba la condición para revisar si se vuelve a repetir
            por eso imprime el número 8 aunque no cumpla la condición.
            Una vez entra el 8 en el do-while se imprime, se realiza el $numero++ es decir que al llegar a la condición $numero=9 y while(9<=5) no se cumple y no se repite el bucle.

    Cuando $numero=3:
        -Entra en el bucle while porque cumple la condición de ser igual a 5 o menor,así que se repite el bucle 
            cuando $numero vale 3(el valor con el que entra), 4 y 5.
            He puesto que en cada vuelta se sume 1 y no se reste porque sino se hacía un bucle infinito al cumplirse la condición de ser igual o menor que 5.
        -Entra en el bucle do-while primero con el valor 3,luego comprueba la condición y repite el bucle con los valores 3,4 y 5.
    -->
</html>