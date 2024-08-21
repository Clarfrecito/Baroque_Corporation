<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Juegos</title>
</head>
<body>
    <!--
    <header>
        <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" id="Logo" border="0">
    </header>
    -->
    <main>
        <div>
            <!--
            <a href="manchita.php">
                <img src="https://mascolombia.com/wp-content/uploads/2024/02/role-of-bingo-in-charity-and-fundraising.jpg" id="fondo">
            </a>
            -->
            <h1>Manchita</h1>
            <?php
                echo "Has iniciado sesion como: ".$_SESSION['username'];
            ?>
            <br>
            <form action="../Controlador/juegos.php" method="POST">
                <input type="submit" value="Jugar Manchita" name="manchita">
            </form>
        </div>
        <!-- Agregar otros juegos aca -->
        <div>
            <h1>En Desarrollo</h1>
        </div>
        <br>
        <form method="POST" action="../Controlador/registrar.php">
            <button type="submit" name="logout">Cerrar Sesión</button>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>