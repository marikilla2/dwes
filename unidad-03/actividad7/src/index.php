<?php

include __DIR__ . '/ej07.php';

$cuenta = new CuentaBancaria("Juan Pérez", 100.0);

echo "Operación | ¿Acepta? | Saldo<br>";
echo "---------------------------<br>";

function probar(CuentaBancaria $cuenta, string $tipo, float $cantidad) {
    $ok = (strtolower($tipo) === 'ingresar') ? $cuenta->ingresar($cantidad) : $cuenta->retirar($cantidad);
    $txtOk = $ok ? "Sí" : "No";
    echo "$tipo $cantidad | $txtOk | " . $cuenta->getSaldo() . " €<br>";
}

probar($cuenta, 'Ingresar', 50.0);
probar($cuenta, 'Retirar', 30.0);
probar($cuenta, 'Retirar', 200.0);
probar($cuenta, 'Ingresar', 0.0);
probar($cuenta, 'Retirar', -10.0);
probar($cuenta, 'Retirar', 120.0);

echo "<br>--- Otras pruebas ---<br>";

$cuenta2 = new CuentaBancaria("María");
echo "Saldo María: " . $cuenta2->getSaldo() . " €<br>";

try {
    new CuentaBancaria("Carlos", -50.0);
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

?>