<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'] ?? '';
    
    if (is_string($texto) && trim($texto) !== '') {
        
        echo nl2br(htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'));
        echo '<br><br><a href="">Volver</a>';
        exit;
    }
    
    echo '<p style="color:red;">Error: El campo no es válido o está vacío.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <textarea name="texto" rows="4"></textarea><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>