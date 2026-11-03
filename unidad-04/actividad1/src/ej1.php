<?php
declare(strict_types=1);

$claves = [
    'REQUEST_METHOD',
    'REQUEST_URI',
    'QUERY_STRING',
    'SCRIPT_NAME',
    'SERVER_NAME',
    'SERVER_SOFTWARE',
    'HTTP_USER_AGENT',
    'HTTP_REFERER',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información de la petición</title>
</head>
<body>
    <h1>Información de la petición</h1>

    <table>
        <thead>
            <tr><th>Clave</th><th>Valor</th></tr>
        </thead>
        <tbody>
            <?php foreach ($claves as $clave): ?>
                <tr>
                    <td><?= $clave ?></td>
                    <td><?= htmlspecialchars(
                        $_SERVER[$clave] ?? 'No disponible',
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Enviar una petición GET</h2>
    <a href="peticion.php?categoria=monitores">Consultar monitores</a>

    <h2>Enviar una petición POST</h2>
    <form action="peticion.php" method="post">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>