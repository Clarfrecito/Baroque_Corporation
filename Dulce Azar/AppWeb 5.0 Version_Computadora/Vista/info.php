<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
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

        h1 {
            margin-top: 3%;
            color: rgb(185, 19, 9);
            font-size: 2.5rem;
            font-family: "Questrial", sans-serif;
        }

        h3{
            margin-top: 5%;
            font-family: "Questrial", sans-serif;
            font-size: 1rem;
            color: rgb(142, 142, 142);
        }

        h2{
            color: cornflowerblue;
        }

        .game-rules {
            margin-bottom: 20px;
            padding: 15px;
            background-color: rgb(185, 19, 9);
            border-radius: 8px;
        }

        .game-rules h2 {
            color: rgb(185, 19, 9);
        }

        .game-rules p {
            color: rgb(185, 19, 9);
            font-family: 'Questrial', sans-serif;
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
            margin-top: 100%;
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

    a {
        font-family: 'Questrial', sans-serif;
        color: rgb(176, 137, 7 );
        text-decoration: underline;
        font-size: 2rem;
    }

    p {
        font-family: 'Questrial', sans-serif;
        color: white;
        font-size: 1.5rem;
        margin-left: 5%;
        margin-right: 5%;
        text-align: justify;
    }

    </style>
</head>
<body>
    <h1>Análisis llevado a cabo para el desarrollo de este proyecto</h1>
    <p>En este link encontraran todos los diagramas, documentos y archivos que se utilizaron
       para el desarrollo de este proyecto. Ya que antes de programar, tuvimos que hacer muchas
       tareas de análisis para determinar los requerimientos del proyecto y comprender el funcio
       namiento de las aplicaciones web. (Para acceder a los documentos de análisis, entrar en la 
       el archivo que dice "Entrega final", ahí estará la carpeta comprimida con lso archivos)
    </p>
    <!--PONER LINK DEL GITHUB-->

    <a href="https://github.com/Clarfrecito/Baroque-Corporation/tree/main/Dulce%20Azar" class="Link al Repositorio">Ver Analisis</a>

    <h3>Cualquier inconveniente, consulta o sugerencia no dude en enviarla al: 11 5964-2186</h3>
    <form method="POST" action="menu_principal.php">
        <button type="submit">Volver</button>
    </form>
</body>
</html>