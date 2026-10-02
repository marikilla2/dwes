<?php
    date_default_timezone_set('Europe/Madrid');
    $modulo = "Desarrollo web en entorno servidor";
    $nombre_propio_completo = trim("María Ortega Cortés ");
    $ambito_propio = "Desarrolladora Web";
    $presentacion_personal = "me gusta hacer páginas web modernas y funcionales";
    $formacion = "bachillerato y en proceso desarrollo de aplicaciones web (grado superior)";
    $experiencia_practica = "prácticas en Viewnext durante primer curso de DAW";
    $habilidades = "trabajo en equipo, paciencia, resiliencia y curiosidad";
    $idiomas = "español e inglés";
    $ciudad_nacimiento = "Málaga";
    $provincia = "Málaga";
    $correo_electronico = "al.maria.ortega.cortes@iesportada.org";
    $fecha = date("d/m/Y");
    $hora = date("H:i:s");
    $versionPHP = phpversion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Propio</title>
</head>

<body style="background-color:#B5D672; font-family:Arial, Helvetica, sans-serif">
    <header>
        <div style="background-color:palegreen">
            <h1 style="background-color: aquamarine; font-family: cursive">Mi Curriculum Personal</h1>

            <img src="website.png" style="width: 200px; height: 200px">

            <h2>Proyecto realizado como parte de la asignatura de <?php echo $modulo ?></h2>
        </div>
    </header>

    <main>
        <div style="background-color:lightgreen; font-family:'Times New Roman', Times, serif">

            <p>Mi nombre completo es <?php echo $nombre_propio_completo ?></p>
            <p>El ámbito en el que me gustaria trabajar es como <?php echo $ambito_propio ?></p>

            <p>Como presentación puedo decir que <?php echo $presentacion_personal ?></p>
            <ul>
                <li>
                    <p>Mi formación es la siguiente <?php echo $formacion ?></p>
                </li>
                <li>
                    <p>Mi experiencia en el sector <?php echo $experiencia_practica ?></p>
                </li>
                <li>
                    <p>Unas cuantas habilidades a destacar podrían ser <?php echo $habilidades ?></p>
                </li>
            </ul>

            <p>Los idiomas que manejo son <?php echo $idiomas ?></p>
            <p>La ciudad y provincia es la siguiente <?php echo $provincia ?></p>
            <p>Mi correo electronico corporativo es <?php echo $correo_electronico ?></p>

            <p>La fecha de generación del curriculum es: <?php echo $fecha ?> <?php echo $hora ?></p>

            <p>La versión de php que estoy usando es: <?php echo $versionPHP ?></p>

            <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight:bold">Enlace a Github corporativo: <a href="https://github.com/almariaiesportada">Enlace a Github</a></p>
        </div>
    </main>

    <footer style="background-color:#7ED622; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
        <p>&copy; <span id="year"></span> María Ortega Cortés. Todos los derechos reservados.</p>
    </footer>
</body>

</html>