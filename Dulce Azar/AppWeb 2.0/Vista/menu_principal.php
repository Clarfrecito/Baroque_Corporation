
<?php
require_once '../Utiles/verificar_sesion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menú Principal</title>
    <h1 style="color: #ff0000; font-size: 24px; text-align: center;">Menu Principal</h1>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Contacto</a></li>
        <li><a href="seleccionar_juegos.php">Juegos</a></li>
    </ul>
    <h3>Baroque-Corporation</h3>
    <div>
        <h1>Manchita</h1>
        
    </div>
    <div>
        <h1>Local Visitante</h1>
    </div>
    <div>
        <h1>Bingo Loco</h1>
        <img src="../../FondoBingo.PNG" alt="Bingo"></img>
    </div>
    <div>
        <h1>Proximamente</h1>
    </div>
</body>
</html>