<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Menú Principal</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesM.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <?php
    //$_SESSION['caramelosTotales'] = $_SESSION['caramelosM'] + $_SESSION['caramelosL'];
    //echo $caramelosTotales;
    ?>
</head>

<body>
    <img src="../../DulceAzar.png" alt="Logo" id="Logo">
    <h1>Dulce Azar</h1>
    <ul>
        <li><a href="acerca.php">Acerca de</a></li>
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="instrucciones.php">¿Como jugar?</a></li>
        <li>
            <form method="POST" action="../Controlador/registrar.php"><button type="submit" name="logout">Cerrar Sesión</button></form>
        </li>
    </ul>
    <div class="grid-container">
        <a href="../Controlador/juegos.php?juego1=manchita" class="grid-item1">
            <div class="background-image1">
                <h1><strong>MANCHITA</strong></h1>
            </div>
        </a>
        <a href="../Controlador/juegos.php?juego2=Local/Visitante" class="grid-item2">
            <div class="background-image2">
                <h1><strong>LOCAL VISITANTE</strong></h1>
            </div>
        </a>
        <a href="#" class="grid-item3">
            <div class="background-image3">
                <h1><strong>BINGO LOCO</strong></h1>
            </div>
        </a>
        <a href="#" class="grid-item4">
            <div class="background-image4">
                <h1><strong>PROXIMAMENTE</strong></h1>
            </div>
        </a>
    </div>
</body>

</html>