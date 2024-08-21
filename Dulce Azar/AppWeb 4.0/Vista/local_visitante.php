<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local vs Visitante</title>
</head>
<body>
    <header>
        <!--
        <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" id="Logo" border="0">
        -->
    </header>
    <main>
        <h1>Local/Visitante</h1>
        <div>
            <h2>Juega al L/V</h2>
            <form method="POST" action="../Controlador/local_visitante.php">
                <input type="submit" value="Jugar L/V" name="local_visitante">
            </form>
        </div>
        <br><br>
        <form method="POST" action="../Controlador/juegos.php">
            <input type="submit" name="FinalizarJuego" value="Finalizar Juego">
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>