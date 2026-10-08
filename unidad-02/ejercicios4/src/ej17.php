<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>
<body>
    <h1>Cuadricula del 1 al 5</h1>

    <table style="border-collapse: collapse; border: 1px solid black">
        <thead style="border-collapse: collapse; border: 1px solid black">
            <tr>
                <th scope="i">x</th>
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <th style="border-collapse: collapse; border: 1px solid black"><?= $i ?></th>
                <?php } ?>
            </tr>
        </thead>
        
        <tbody style="border-collapse: collapse; border: 1px solid black">
            <th scope="j"> 
                <?php for ($j = 1; $j <= 5; $j++) { ?>
                <tr>
                    <th style="border-collapse: collapse; border: 1px solid black"><?= $j ?></th>

                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <td style="border-collapse: collapse; border: 1px solid black"><?= $j * $i ?></td>
                            <?php } ?>
                </tr>
                <?php } ?>
            </th>
        </tbody> 
    </table>
</body>
</html>

