<?php

include __DIR__ . '/ej07.php';

$cuenta = new CuentaBancaria("Juan Pérez", 100.0);

function probar(CuentaBancaria $cuenta, string $tipo, float $cantidad) {
    $ok = (strtolower($tipo) === 'ingresar') ? $cuenta->ingresar($cantidad) : $cuenta->retirar($cantidad);
    $txtOk = $ok ? "Aprobado" : "Rechazado";
    echo "$tipo $cantidad | $txtOk | " . $cuenta->getSaldo() . " €<br>";
}

$cuenta2 = new CuentaBancaria("María");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "Cuenta de Juan Pérez". "<br>";
        echo "Saldo inicial: 100". "<br>";
        echo "Operación | ¿Acepta? | Saldo<br>";
        echo "---------------------------<br>";

        probar($cuenta, 'Ingresar', 50.0);
        probar($cuenta, 'Retirar', 30.0);
        probar($cuenta, 'Retirar', 200.0);
        probar($cuenta, 'Ingresar', 0.0);
        probar($cuenta, 'Retirar', -10.0);
        probar($cuenta, 'Retirar', 120.0);

        echo "<br>--- Otras pruebas ---<br>";

        echo "Saldo de la cuenta de María: " . $cuenta2->getSaldo() . " €<br>";

        echo "Otra cuenta bancaria, a continuación detalles: " . "<br>";
        try {
            $nuevaCuenta = new CuentaBancaria("Carlos", -50.0);
        } catch (InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    ?>
</body>
</html>