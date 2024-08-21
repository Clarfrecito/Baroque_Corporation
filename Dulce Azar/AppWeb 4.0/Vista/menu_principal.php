<?php
require_once '../Utiles/verificar_sesion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menú Principal</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesM.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Baroque-Corporation</h1>
    <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Contacto</a></li>
        <li><a href="seleccionar_juegos.php">Juegos</a></li>
    </ul>
    <div class="grid-container">
        <a href="manchita.php" class="grid-item1">
        <div class="background-image1">
                <h1>Manchita</h1>   
        </div>
        </a>
        <a href="manchita.php" class="grid-item2">
        <div class="background-image2">
                <h1>Local Visitante</h1>
        </div>  
        </a>   
        <a href="manchita.php" class="grid-item3">      
        <div class="background-image3">
                <h1>Bingo Loco</h1>
        </div>
        </a>
        <a href="manchita.php" class="grid-item4">
        <div class="background-image4">
                <h1>Proximamente</h1>
        </div>
        </a>
    </div>
    <form method="POST" action="../Controlador/registrar.php">
            <button type="submit" name="logout">Cerrar Sesión</button>
        </form> 
</body>
</html>