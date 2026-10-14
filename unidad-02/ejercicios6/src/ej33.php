
<?php
//declare(strict_types = 1);

$menu = [
    'primero' => 'Ensalada mediterránea',
    'segundo' => 'Pescado con patatas'
];

function agregarPostre(array $menu, string $postre): array
{
    $menuAmpliado = $menu;
    $menuAmpliado['postre'] = $postre;

    return $menuAmpliado;
}

function agregarBebida(array &$menu, string $bebida): void
{
    $menu['bebida'] = $bebida;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menús</title>
</head>
<body>
    <?php
    // Añadimos una bebida modificando el menú original.
    agregarBebida($menu, 'Agua');

    echo '<h2>Menú original modificado</h2>';

    foreach ($menu as $tipo => $plato) {
        echo $tipo . ': ' . $plato . '<br>';
    }

    // Creamos un nuevo menú con postre.
    $menuConPostre = agregarPostre($menu, 'Flan');

    echo '<h2>Menú ampliado con postre</h2>';

    foreach ($menuConPostre as $tipo => $plato) {
        echo $tipo . ': ' . $plato . '<br>';
    }

    echo '<h2>Menú original después de añadir el postre</h2>';

    foreach ($menu as $tipo => $plato) {
        echo $tipo . ': ' . $plato . '<br>';
    }
    ?>
</body>
</html>
