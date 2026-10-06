<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Ejercicio 14 - Cuenta atrás con while</title>
  </head>
  <body>
    <h2>Cuenta atrás para el despegue</h2>

    <ul>
      <?php $contador = 10; while ($contador >= 0) { 
        echo "<li>{$contador}</li>"; 
        $contador--; } 
      ?>
    </ul>

    <p>¡Despegue!</p>
  </body>
</html>
