<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Acerca De</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <h2>Esta pagina fue creada por Baroque Corporation</h2>
    <h1>Baroque Corporation es una empresa/grupo de programacion ficticio que fundamos para el desarrollo del proyecto anual de Analisis de Sistemas</h1>
    <h2>Integrantes:</h2>
    <h3>Tomas Palumbo</h3>
    
    <h3>Sol Oliveti</h3>
    <h3>Marco Montarner</h3>
    <h3>Santino Solferino</h3>
    
    <form action="menu_principal.php">
        <button type="submit">Volver</button>
    </form>
</body>
<style>
    :root {
    --primary-color: rgb(0, 0, 0);
    --secondary-color: rgb(61, 12, 8);
    --hover-color: rgb(255, 255, 255);
    }

    body {
        font-family: "Questrial", sans-serif;
        background-color: #1E1E1E;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        background-image: url('../../fondoM.PNG');
        background-size: cover;
        background-repeat: repeat;
        background-position: center;
    }

    main {
        margin-top: 3%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    button {
        font-family: 'Questrial', sans-serif; /* Usa la fuente Questrial */
        font-size: 16px; /* Ajusta el tamaño de la fuente según lo necesites */
        letter-spacing: 0.075em;
        box-sizing: border-box;
        border: 0;
        border-radius: 5px;
        color: white;
        padding: 1rem;
        background: rgb(185, 19, 9);
        transition: 0.2s background;
        margin-top: 38%;
        margin-bottom: 40%;
        height: auto;
        width: 100%;
        font-size: 1rem;
        cursor: pointer;
        text-align: center;
        font-weight: bold;
    }

    button:hover {
        background-color: var(--secondary-color);
        color: var(--hover-color);
    }

    h1 {
        color: yellow;
        font-size: 1.25rem;
        font-weight: normal;
        letter-spacing: 0.025em;
    }

    h2 {
        color: red;
        font-size: 1.5rem;
        font-weight: bold;
        letter-spacing: 0.025em;
    }
    
    h3{
        color: cornsilk;
    }
</style>

</html>