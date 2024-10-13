<!DOCTYPE html>
<html lang="en">

<head>
    <title>Local vs Visitante</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesLV.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <!--
        <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" id="Logo" border="0">
        -->
    </header>
    <main>
        <h1>Local/Visitante</h1>
        <div class="div-contenedor">
            <h2>Juega al L/V</h2>
            <form method="POST" action="../Controlador/local_visitante.php">
                <button type="submit" value="Jugar L/V" name="local_visitante">Jugar</button>
            </form>
            <form method="POST" action="../Vista/menu_principal.php">
                <button type="submit" value="Salir del Juego" name="Salir">Salir</button>
            </form>
        </div>
        <?php
        if (isset($_GET['jugar2'])) {
        ?>
            <div class="div-contenedor">
                <h3>¿Quien Ganará? o.. ¿Empatarán?</h3>
                <form method="POST" action="../Controlador/local_visitante.php">
                    <select name="posicion" required>
                        <option value="Local">Local</option>
                        <option value="Visitante">Visitante</option>
                        <option value="Empate">Empate</option>
                    </select>
                    <button type="submit" name="apostar2" value="Apostar">Apostar</button>
                </form>
                <br>
            </div>
        <?php
        }
        ?>
        <br><br>
    </main>
    <footer>
        <h3>2024 Dulce Azar. Creado por Baroque Corporation.</h3>
    </footer>
</body>

</html>