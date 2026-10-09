<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $menus = [

    [
        'primero' => 'Ensaladilla rusa',
        'segundo' => 'Pollo asado con patatas',
        'postre' => 'Flan de huevo'
    ],

    [
        'primero' => 'Salmorejo cordobés',
        'segundo' => 'Merluza al horno',
        'postre' => 'Tarta de queso'
    ],

    [
        'primero' => 'Croquetas de jamón',
        'segundo' => 'Solomillo de cerdo con salsa',
        'postre' => 'Arroz con leche'
    ]

];

foreach($menus as $menu){
    foreach($menu as $tipo => $plato){
         echo '<p>'. htmlspecialchars($tipo, ENT_QUOTES, 'UTF-8') .'</p>';
         echo '<p>'. htmlspecialchars($plato, ENT_QUOTES, 'UTF-8') .'</p>';
    }
}
        $menu = $menus[0];

        print_r(array_keys($menu));

        if (isset($menu['postre'])) {
            echo 'El menú tiene postre.';
        } else {
            echo 'El menú no tiene postre.';
        }

        $menu['bebida'] = 'Agua';

        unset($menu['segundo']);

        echo '<pre>';
        print_r($menu);
        echo '</pre>';

        $menu['observaciones'] = null;

        var_dump(isset($menu['observaciones']));
        var_dump(array_key_exists('observaciones', $menu));

        $copiaMenu = $menu;

        asort($copiaMenu);

        echo '<pre>';
        print_r($copiaMenu);
        echo '</pre>';

        echo '<h2>Menú original</h2>';
        echo '<pre>';
        print_r($menu);
        echo '</pre>';
    ?>
</body>
</html>