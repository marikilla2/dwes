<?php
    include __DIR__ . '/productos.php';
    include __DIR__ . '/funciones.php';
    
    foreach($productos as $producto){
        echo $producto['identificador'] . '- ' . $producto['nombre'] . '- ' . $producto['categoria'] . '- ' . $producto['precio'] . '<br>';
    }

    $cantidadProd = count($productos);
    echo "Total productos: " . $cantidadProd . '<br>';

    include __DIR__ . '/encabezado.php';
?>

    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Tu nombre">
        <select name="desplegable">
            <option value="1">Teclado</option>
            <option value="2">Ratón</option>
            <option value="3">Monitor</option>
            <option value="4">Memoria USB</option>
            <option value="5">Auriculares</option>
        </select>
        <select name="desplegable2">
            <?php for ($i = 0; $i <= 10; $i++) { ?>
            <option value="<?= $i ?>"><?= $i ?></option>
            <?php } ?>
        </select>
        <input type="checkbox" name="estudiante" id="1">
        <label for="1">Estudiante</label>
        <textarea placeholder="Escribe aquí tus observaciones" name="cuadro"></textarea>

        <button type="submit">Calcular presupuesto</button>
    </form>

    <?php
        $nombre = trim($_POST['nombre'] ?? "");
        $id = $_POST['desplegable'] ?? "";
        $cantidad = (int)($_POST['desplegable2'] ?? 0);
        $observaciones = trim($_POST['cuadro'] ?? "");
        $cliente = isset($_POST['estudiante']) ? 'estudiante' : 'normal';

        if ($cantidad < 0 || $cantidad > 10) {
            echo "Error, está fuera de los límites";
        } else {
            foreach ($productos as $producto) {
                if ($producto['identificador'] == $id) {

                    $subtotal = calcularSubtotal($producto['precio'], $cantidad);
                    $porcentajeDescuento = obtenerDescuento($cliente);
                    $valorDescuento = calcularDescuento($subtotal, $porcentajeDescuento);
                    $base = $subtotal - $valorDescuento;
                    $iva = calcularIVA($base);
                    $total = $base + $iva;

                    echo "<br>Cliente: " . htmlspecialchars($nombre) . '<br>';
                    echo "Producto: " . htmlspecialchars($producto['nombre']) . ' compra ' . $cantidad . ' ' . strtolower($producto['nombre']) . '(s)<br>';
                    
                    $baseTexto = ($valorDescuento > 0) ? " · Base: " . formatearPrecio($base) : "";

                    $resultadoLinea = "Subtotal: " . formatearPrecio($subtotal) . 
                                    " Descuento: " . formatearPrecio($valorDescuento) . $baseTexto . 
                                    " IVA: " . formatearPrecio($iva) . 
                                    " Total: " . formatearPrecio($total);

                    echo $resultadoLinea . '<br>';
                    echo "Observaciones: " . htmlspecialchars($observaciones) . '<br>';
                }
            }
        }

        include __DIR__ . '/pie.php';
    ?>