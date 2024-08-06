<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesJ.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <title>Juegos</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof resultado !== 'undefined' && typeof ganancia !== 'undefined') {
                alert('La manchita salió en la posición: ' + resultado + '. Ganancia: ' + ganancia + ' caramelos.');
            }
        });
    </script>
</head>
<body>
    <header>
            <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" id="Logo" border="0">  
    </header>
    <main>
        <div>
            <a href="manchita.php">
                <img src="https://mascolombia.com/wp-content/uploads/2024/02/role-of-bingo-in-charity-and-fundraising.jpg" id="fondo"> 
            </a>
            <h1>Manchita</h1>
            <form action="manchita.php" method="POST">
                <input type="submit" value="Jugar Manchita" name="manchita">
            </form>
        </div>
        <div>
            <h1>Bingo Loco</h1>
        </div>
        <div>
            <h1>Local Visitante</h1>
        </div>
        <div>
            <h1>En Desarrollo</h1>
        </div>
        <br>
        <form method="POST" action="../Controlador/registrar.php">
            <button type="submit" name="logout">Cerrar Sesión</button>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>
