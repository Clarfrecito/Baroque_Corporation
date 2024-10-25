<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca De</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Esta pagina fue creada por Baroque Corporation</h2>
    <h1>Baroque Corporation es una empresa/grupo de programacion ficticio que fundamos para el desarrollo del proyecto anual de Analisis de Sistemas</h1>
    <h2>Integrantes:</h2>
    <h3>Tomas Palumbo</h3>
    <h3>Juan Freire</h>
    <h3>Santino Solferino</h3>
    <h3>Sol Oliveti</h3>
    <h3>Marco Montarner</h3>

    
    <form action="menu_principal.php">
        <button type="submit">Volver</button>
    </form>
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
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    main {
        margin-top: 3%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }


    button {
        box-sizing: border-box;
        border: 0;
        border-radius: 20%;
        color: var(--secondary-color);
        padding: 1rem;
        background: var(--primary-color);
        transition: 0.2s background;
        margin-top: 5%;
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
        color: cadetblue;
        font-size: 1.25rem;
        font-weight: normal;
        letter-spacing: 0.025em;
    }

    h2 {
        color: aquamarine;
        font-size: 1.5rem;
        font-weight: bold;
        letter-spacing: 0.025em;
    }
    h3{
        color: cornsilk;
    }
</style>

</html>