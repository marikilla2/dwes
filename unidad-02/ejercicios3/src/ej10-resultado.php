<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero1 = (int) $_POST['numero1'] ?? '';
        $numero2 = (int) $_POST['numero2'] ?? '';
        $numero3 = (int) $_POST['numero3'] ?? '';
        if($numero1 > $numero2){
            if($numero1 > $numero3){
                echo "El numero mayor es el número 1";
            }
        }
        if($numero2 > $numero3){
            if($numero2 > $numero1){
                echo "El numero mayor es el número 2";
            }
        }
        if($numero3 > $numero2){
            if($numero3 > $numero1){
                echo "El numero mayor es el número 3";
            }
        }
        if($numero3 === $numero2){
            if($numero3 === $numero1){
                echo "Los numeros son iguales";
            }
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero1 = (int) $_POST['numero1'] ?? '';
        $numero2 = (int) $_POST['numero2'] ?? '';
        $numero3 = (int) $_POST['numero3'] ?? '';
        if($numero1 > $numero2 && $numero1 > $numero3){
            echo "El numero mayor es el número 1";
        }
        if($numero2 > $numero3 && $numero2 > $numero1){
            echo "El numero mayor es el número 2";
        }
        if($numero3 > $numero2 && $numero3 > $numero1){
            echo "El numero mayor es el número 3";
        }
        if($numero3 === $numero1 && $numero3 === $numero2 && $numero2 === $numero1){
            echo "Los tres numeros son iguales";
        }
    }
    
?>