<?php
require_once __DIR__ . '/funciones.php';

$precioFinal = aplicarDescuento(100,5);
formatearPrecio($precioFinal);

$mensaje = "Primera línea\nSegunda línea";
echo $mensaje;
echo '<br>';

echo nl2br(htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'));
?>