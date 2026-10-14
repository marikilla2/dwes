<?php
declare(strict_types = 1);

$menu = [
    'primero' => 'Ensalada mediterránea',
    'segundo' => 'Pescado con patatas'
];
function agregarPostre(array $menu, string $postre) : array
{
    $menu['postre'] = $postre;
    return $menu;

};

function agregarBebida(array &$menu, string $bebida): void
{
    $menu['bebida'] = $bebida;
};


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
        $array = agregarPostre($menu, 'Arroz con leche');
        foreach($array as $ar){
            echo $ar . '<br>';
        };

        agregarBebida($menu, 'Aquarius');
        foreach($menu as $menus){
            echo $menus . '<br>';
        }
    ?>
</body>
</html>