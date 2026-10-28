<?php

require_once __DIR__ . '/ej19.php';

function obtenerTotal(Producto $producto): float {
    return $producto->calcularTotal();
}

$productos = [
    new ProductoFisico("Teclado", 25.00, 0.5),
    new ProductoDigital("Curso PHP", 20.00),
    new ProductoFisico("Monitor", 180.00, 4.0)
];

$sumaTotal = 0.0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
</head>
<body>

    <h1>Catálogo de Productos Físicos y Digitales</h1>

    <table>
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Envío</th>
                <th>Total esperado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): 
                $envio = $producto->calcularGastosEnvio();
                $total = obtenerTotal($producto);
                $sumaTotal += $total;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto->obtenerDescripcion()); ?></td>
                    <td><?php echo number_format($producto->getPrecio(), 2, ',', '.') . ' €'; ?></td>
                    <td><?php echo number_format($envio, 2, ',', '.') . ' €'; ?></td>
                    <td><?php echo number_format($total, 2, ',', '.') . ' €'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Suma Total Conjunta: <?php echo number_format($sumaTotal, 2, ',', '.') . ' €'; ?></h3>

    <div class="success-box">
        <h3>Pruebas de Excepciones (Validaciones de Entrada):</h3>
        <?php
        // Prueba 1
        try {
            $invalidoFisico = new ProductoFisico("Peso Inválido", 10.0, 0.0);
        } catch (InvalidArgumentException $e) {
            echo '<p class="error">[Capturada correctamente] Producto Físico: ' . htmlspecialchars($e->getMessage()) . '</p>';
        }

        // Prueba 2
        try {
            $invalidoDigital = new ProductoDigital("Precio Negativo", -5.0);
        } catch (InvalidArgumentException $e) {
            echo '<p class="error">[Capturada correctamente] Producto Digital: ' . htmlspecialchars($e->getMessage()) . '</p>';
        }
        ?>
    </div>

</body>
</html>

<?php
/*
 * ¿Por qué no puedes crear directamente un objeto Producto?
 *    - Porque Producto es una clase abstracta y está incompleta (contiene 
 *      métodos sin cuerpo). PHP prohíbe instanciarlas directamente.
 * 
 * ¿Qué obliga a implementar el método abstracto?
 *    - El motor de PHP. Exige que cualquier clase hija concreta implemente 
 *      los métodos abstractos heredados; de lo contrario, lanza un error fatal.
 * 
 * ¿Qué impide final en getPrecio()? ¿Pueden las hijas utilizarlo?
 *    - La palabra final impide que las hijas sobrescriban el método, pero 
 *      sí permite que lo invoquen y utilicen normalmente.
 * 
 * ¿Qué impide final en ProductoDigital?
 *    - Bloquea por completo la herencia en esa clase: ninguna otra clase 
 *      puede heredar de ProductoDigital (no permite clases "nietas").
 * 
 * Cuando calcularTotal() se ejecuta sobre el teclado, ¿qué objeto 
 *    representa $this y qué versión del cálculo de envío se utiliza?
 *    - ¿Qué representa $this?: La instancia concreta de ProductoFisico del teclado.
 *    - ¿Qué envío se usa?: El de ProductoFisico ($this->peso * 2.0) por polimorfismo.
 * 
 * RECORRIDO COMPLETO DEL TECLADO (hasta el resultado 26,00 €):
 * 1. Se invoca obtenerTotal($teclado) pasando la instancia de ProductoFisico.
 * 2. Se ejecuta calcularTotal() heredado de la clase padre Producto.
 * 3. Dentro de Producto::calcularTotal(), se suma:
 *    - El precio (25,00 €) obtenido mediante getPrecio().
 *    - Los gastos de envío, resolviendo dinámicamente el método en 
 *      ProductoFisico (0,5 kg * 2 € = 1,00 €).
 * 4. Resultado final devuelto: 25,00 € + 1,00 € = 26,00 €.
 */
?>