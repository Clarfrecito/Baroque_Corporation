<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <title>Manchita</title>
</head>

<body>
    <header>
        <!--
        <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" id="Logo" border="0">
        -->
    </header>
    <main>
        <h1>El Juego de la Manchita</h1>
        <div>
            <h2>Juega a la Manchita</h2>
            <form method="POST" action="../Controlador/manchita.php">
                <input type="submit" value="Jugar Manchita" name="jugarManchita">
            </form>

            <?php
            // Comprobación de `isset($_GET['jugar'])`.
            if (isset($_GET['jugar'])) {
                ?>
                <h3>¿En qué rango de cartas saldrá la manchita?</h3>
                <form method="POST" action="../Controlador/manchita.php">
                    <!--<input type="number" name="posicion" min="1" max="50" required>-->
                    <select name="rango">
                        <option value="1-10">1-10</option>
                        <option value="11-20">11-20</option>
                        <option value="21-30">21-30</option>
                        <option value="31-40">31-40</option>
                        <option value="41-50">41-50</option>
                    </select>
                    <input type="submit" name="apostar" value="Apostar">
                </form>
            <?php
            }
            ?>
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