<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Manchita</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesManchita.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="../../DulceAzar.png" alt="Logo">
    </header>
    <main>

        <div class="div-contenedor">
            <h1>El Juego de la Manchita</h1>
            <form method="POST" action="../Controlador/manchita.php">
                <button type="submit" value="Jugar Manchita" name="jugarManchita">Jugar</button>
            </form>
            <form method="POST" action="../Vista/menu_principal.php">
                <button type="submit" value="Salir del Juego" name="Salir">Salir</button>
            </form>
        </div>
        <?php
        if (isset($_GET['jugar'])) {
        ?>
            <div class="div-contenedor">
                <h3>¿En qué rango de cartas saldrá la manchita?</h3>
                <form method="POST" action="../Controlador/manchita.php">
                    <select name="rango" required>
                        <option value="1-10">1-10</option>
                        <option value="11-20">11-20</option>
                        <option value="21-30">21-30</option>
                        <option value="31-40">31-40</option>
                        <option value="41-50">41-50</option>
                    </select>
                    <button type="submit" name="apostar" value="Apostar">Apostar</button>
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