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
            --secondary-color: #00BAFF;
            --hover-color: rgb(255, 255, 255);
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #121212;
            color: #e0e0e0;
            text-align: center;
        }

        h1 {
            color: #bb86fc;
        }

        h3{
            color: burlywood;
        }

        h2{
            color: cornflowerblue;
        }

        .game-rules {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #1f1f1f;
            border-radius: 8px;
        }

        .game-rules h2 {
            color: #03dac6;
        }

        .game-rules p {
            color: #b0b0b0;
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
            width: 10%;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
        }

        button:hover {
            background-color: var(--secondary-color);
            color: var(--hover-color);
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
    <h2>https://github.com/Clarfrecito/Baroque-Corporation/tree/main/Dulce%20Azar</h2>

    <h3>Cualquier inconveniente, consulta o sugerencia no dude en enviarla al: 11 5964-2186</h3>
    <form method="POST" action="menu_principal.php">
        <button type="submit">Volver</button>
    </form>
</body>
</html>