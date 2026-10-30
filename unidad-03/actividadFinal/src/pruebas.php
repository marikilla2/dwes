<?php

declare(strict_types=1);

require_once __DIR__ . '/Describible.php';
require_once __DIR__ . '/Categoria.php';
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/ProductoFisico.php';
require_once __DIR__ . '/ProductoDigital.php';
require_once __DIR__ . '/Catalogo.php';

header('Content-Type: text/plain; charset=utf-8');

function sonIgualesFloat(float $a, float $b, float $tolerancia = 0.001): bool
{
    return abs($a - $b) < $tolerancia;
}

echo "PRUEBAS DE LA APLICACIÓN (pruebas.php)";

$catVacio = new Catalogo();
$p1_num = $catVacio->contarProductos();
$p1_val = $catVacio->calcularValorTotal();
$p1_ok = ($p1_num === 0) && sonIgualesFloat($p1_val, 0.0);
printf("[P1] Catálogo vacío -> %d productos, valor %.2f € | Resultado: %s\n", $p1_num, $p1_val, $p1_ok ? 'OK' : 'ERROR');

$catComp = new Catalogo();
$catPerifericos = new Categoria("Periféricos");
$catPantallas = new Categoria("Pantallas");
$catFormacion = new Categoria("Formación");

$catComp->anadirProducto(new ProductoFisico("Teclado", 35.0, $catPerifericos, 0.5, 5));
$catComp->anadirProducto(new ProductoFisico("Ratón", 20.0, $catPerifericos, 0.2, 8));
$catComp->anadirProducto(new ProductoFisico("Monitor", 180.0, $catPantallas, 4.0, 2));
$catComp->anadirProducto(new ProductoDigital("Curso PHP", 40.0, $catFormacion));

$p2_num = $catComp->contarProductos();
$p2_val = $catComp->calcularValorTotal();
$p2_ok = ($p2_num === 4) && sonIgualesFloat($p2_val, 284.40);
printf("[P2] Catálogo de 4 productos -> %d productos, valor conjunto %.2f € | Resultado: %s\n", $p2_num, $p2_val, $p2_ok ? 'OK' : 'ERROR');

$pDig = new ProductoDigital("Curso PHP", 40.0, $catFormacion);
$p3_envio = $pDig->calcularGastosEnvio();
$p3_total = $pDig->calcularTotal();
$p3_ok = sonIgualesFloat($p3_envio, 0.0) && sonIgualesFloat($p3_total, 40.0);
printf("[P3] Producto digital -> Envío %.2f €, Total %.2f € | Resultado: %s\n", $p3_envio, $p3_total, $p3_ok ? 'OK' : 'ERROR');

$p4_prod = new ProductoFisico("Teclado Test", 35.0, $catPerifericos, 0.5, 5);
$p4_prod->reservar(5);
$p4_stock = $p4_prod->getStock();
$p4_ok = ($p4_stock === 0);
printf("[P4] Reservar 5 de 5 -> Stock posterior: %d | Resultado: %s\n", $p4_stock, $p4_ok ? 'OK' : 'ERROR');

$p5_prod = new ProductoFisico("Teclado Test", 35.0, $catPerifericos, 0.5, 5);
$p5_capturada = false;
$p5_msg = "";
try {
    $p5_prod->reservar(6);
} catch (InvalidArgumentException $e) {
    $p5_capturada = true;
    $p5_msg = $e->getMessage();
}

$p5_ok = $p5_capturada && ($p5_prod->getStock() === 5);
printf("[P5] Reservar 6 de 5 -> Excepción: '%s', Stock: %d | Resultado: %s\n", $p5_msg, $p5_prod->getStock(), $p5_ok ? 'OK' : 'ERROR');

$p6_prod = new ProductoFisico("Teclado Test", 35.0, $catPerifericos, 0.5, 5);
$p6_capturada = false;
$p6_msg = "";
try {
    $p6_prod->reservar(0);
} catch (InvalidArgumentException $e) {
    $p6_capturada = true;
    $p6_msg = $e->getMessage();
}

$p6_ok = $p6_capturada && ($p6_prod->getStock() === 5);
printf("[P6] Reservar 0 -> Excepción: '%s', Stock: %d | Resultado: %s\n", $p6_msg, $p6_prod->getStock(), $p6_ok ? 'OK' : 'ERROR');

$p7_prod = new ProductoFisico("Teclado Test", 35.0, $catPerifericos, 0.5, 5);
$p7_capturada = false;
$p7_msg = "";
try {
    $p7_prod->reponer(-1);
} catch (InvalidArgumentException $e) {
    $p7_capturada = true;
    $p7_msg = $e->getMessage();
}

$p7_ok = $p7_capturada && ($p7_prod->getStock() === 5);
printf("[P7] Reponer -1 -> Excepción: '%s', Stock: %d | Resultado: %s\n", $p7_msg, $p7_prod->getStock(), $p7_ok ? 'OK' : 'ERROR');

$p8_capturada = false;
$p8_msg = "";
try {
    $pInvalido = new ProductoFisico("Producto Erróneo", -10.0, $catPerifericos, 1.0, 5);
} catch (InvalidArgumentException $e) {
    $p8_capturada = true;
    $p8_msg = $e->getMessage();
}

$p8_ok = $p8_capturada;
printf("[P8] Construir con precio -10 € -> Excepción: '%s' | Resultado: %s\n", $p8_msg, $p8_ok ? 'OK' : 'ERROR');

$contadorAntes = Producto::getTotalCreados();
$p9_capturada = false;
$p9_msg = "";
try {
    $pPesoInvalido = new ProductoFisico("Caja Vacía", 10.0, $catPerifericos, 0.0, 5);
} catch (InvalidArgumentException $e) {
    $p9_capturada = true;
    $p9_msg = $e->getMessage();
}

$contadorDespues = Producto::getTotalCreados();
$p9_ok = $p9_capturada && ($contadorAntes === $contadorDespues);
printf("[P9] Construir con peso 0 kg -> Excepción: '%s', Creados antes: %d, después: %d | Resultado: %s\n", $p9_msg, $contadorAntes, $contadorDespues, $p9_ok ? 'OK' : 'ERROR');

$p10_capturada = false;
$p10_msg = "";
try {
    $catEspacios = new Categoria("   ");
} catch (InvalidArgumentException $e) {
    $p10_capturada = true;
    $p10_msg = $e->getMessage();
}

$p10_ok = $p10_capturada;
printf("[P10] Construir Categoria '   ' -> Excepción: '%s' | Resultado: %s\n", $p10_msg, $p10_ok ? 'OK' : 'ERROR');

echo "\n=== FIN DE LAS PRUEBAS ===\n";