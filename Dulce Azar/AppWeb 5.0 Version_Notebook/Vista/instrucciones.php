<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
    <style>
        :root {
            --primary-color: rgb(0, 0, 0);
            --secondary-color: rgb(61, 12, 8);
            --hover-color: rgb(255, 255, 255);
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #121212;
            color: #e0e0e0;
            text-align: center;
            background-image: url('../../fondoM.PNG');
            background-size: cover;
            background-repeat: repeat;
            background-position: center;
        }

        h1 {
            color: #bb86fc;
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
        margin-top: 4.5%;
        height: auto;
        width: 7%;
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
    <h1>Reglas de los Juegos</h1>
    <div class="game-rules">
        <h2>Juego 1: Manchita</h2>
        <p>El juego consiste en apostar el rango de cartas correcto (de a 10) en el que saldrá la carta 1 de oro. Se
            tirarán todas las 50 cartas hasta que salga esa. Si la apuesta del usuario es correcta y la carta sale en ese
            rango especificado, el usuario gana, sino pierde. Al acertar en el rango apostado, la ganancia será de 3000 caramelos,
            si se apuesta por un rango erróneo se perderán 1000 caramelos.
        </p>
    </div>

    <div class="game-rules">
        <h2>Juego 2: Local/Visitante</h2>
        <p>El juego consiste en apostar qué jugador equipo va a ganar: el Local, el Visitante o el Empate entre estos
            dos. Se lanzarán 2 cartas, y con respecto a los valores de cartas del truco, se determinará el ganador. En
            este juego son 48 cartas ya que no están incluidos los comodines. Al apostar por el "Local" y acertar, la
            ganancia será de 3000 caramelos, si pierde se le restarán 1000 caramelos. Lo mismo sucedera con al apostar 
            por el "Visitante". En cambio si se apuesta por el "Empate", la ganancia será de 15000 caramelos, esto se 
            debe a que es mas difícil que las cartas empaten por lo que la ganancia es mayor al acertar, sino acierta 
            perdera 1000 caramelos.
        </p>
    </div>
    <!-- <p>Nota: Los caramelos son pertenecientes a cada juego, cada usuario tiene una cantidad de caramelos, separada, para los dos juegos.</p> -->
    <form method="POST" action="menu_principal.php">
        <button type="submit">Volver</button>
    </form>
</body>
</html>