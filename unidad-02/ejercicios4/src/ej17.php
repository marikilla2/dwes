<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>
<body>
    <h1>Cuadricula del 1 al 5</h1>

    <table style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="i">x</th>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <th><?= $i ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        
        <tbody>
            <th scope="j"> 
                <?php for ($j = 1; $j <= 5; $j++): ?>
                <tr>
                    <th><?= $j ?></th>

                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <td><?= $j * $i ?></td>
                            <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </th>
        </tbody> 
    </table>
</body>
</html>

