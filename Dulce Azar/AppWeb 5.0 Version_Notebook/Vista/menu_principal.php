<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Menú Principal</title>
    <meta charset="UTF-8">
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
        <li><a href="instrucciones.php">¿Como jugar?</a></li>
        <li><a href="info.php">Información</a></li>
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

    </div>
</body>
<style>
    :root {
        --primary-color: rgb(0, 0, 0);
        --secondary-color: #00BAFF;
        --hover-color: rgb(255, 255, 255);
    }

    body {
        font-family: "Questrial", sans-serif;
        background-color: #1E1E1E;
        color: white;
    }

    .grid-item1:hover {
        color: white;
        transform: scale(1.025);
        background-image: linear-gradient(#0300d8 0%, rgba(0, 0, 0, 0.9) 100%), url('../../FondoManchita.PNG');
    }

    .grid-item2:hover {
        color: white;
        transform: scale(1.025);
        background-image: linear-gradient(#0300d8, rgba(0, 0, 0, 0.9)), url('../../FondoLV.PNG');
    }

    h1 {
        font-size: 2rem;
        font-weight: normal;
        letter-spacing: 0.025em;
        transition: color 0.3s ease, transform 0.3s ease;
        /* Transición suave */
    }

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
        /* Elimina el subrayado de los enlaces */
    }
    li button{
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        /* Elimina el subrayado de los enlaces */
        font-weight: bold;
    }
    li a:hover {
        background-color: #111;
        text-decoration: none;
        /* Asegura que no haya subrayado al hacer hover */
        
    }
    

    .grid-item1 {
        background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url('../../FondoManchita.PNG');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 3px solid rgb(255, 255, 255);
        height: 100%;
        width: 97.5%;
        transition: 0.2s background, 0.2s transform;
        cursor: pointer;
        text-decoration: none;
        color: white;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        margin: 15px auto;
}

    .grid-item2 {
        background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url('../../FondoLV.PNG');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 3px solid rgb(255, 255, 255);
        height: 100%;
        width: 97.5%;
        transition: 0.2s background, 0.2s transform;
        cursor: pointer;
        text-decoration: none;
        color: white;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        margin: 15px auto;
    }

    .grid-container {
        display: grid;
        width: 100%;
        height: 75vh;
        grid-template-columns: repeat(2, 1fr);
        margin: 0;
        gap: 20px;
    }

    #Logo {
        margin-top: 13.5px;
        height: 10%;
        position: absolute;
        top: 0;
        right: 0;
    }

    li body {
        font-family: "Questrial", sans-serif;
        background-color: #1E1E1E;
        color: white;
    }

    #logo-container {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    #Logo {
        height: 50px;
        /* Ajusta la altura del logo según sea necesario */
    }

    .grid-item:hover {
        font-weight: bold;
        color: black;
        background-color: #666;
        /* Color de fondo al pasar el ratón */
        transform: scale(1.05);
        /* Efecto de zoom al pasar el ratón */
    }

    h1 {
        font-size: 2rem;
        font-weight: normal;
        letter-spacing: 0.025em;
    }

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

    li a,
    li button {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        /* Elimina el subrayado de los enlaces */
        background: none;
        border: none;
        cursor: pointer;
    }

    li a:hover,
    li button:hover {
        background-color: #111;
        text-decoration: none;
        /* Asegura que no haya subrayado al hacer hover */
    }

    button {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        /* Elimina el subrayado de los enlaces */
    }

    li button:hover {
        background-color: #111;
        text-decoration: none;
        /* Asegura que no haya subrayado al hacer hover */
    }
</style>

</html>