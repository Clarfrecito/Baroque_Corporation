<?php
//include "../Utiles/verificar_sesion.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesJ.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <title>Menu</title>
</head>

<body>
    <header>
        <h1>Dulce Azar</h1>
        <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" alt="k4u-UAAAAASUVORK5-CYII" border="0">  
    </header>
    <main>
        <h1> ¡Hola, mundo desde HTML!</h1>
        <form method="POST" action="../Controlador/registrar.php">
            <button type="submit" name="logout">Cerrar Sesión</button>
        </form>
        <?php
        echo "¡Hola, mundo desde PHP!";
        ?>
    </main>
    <footer>
        <h3>2024 Dulce Azar. Creado por Baroque Corporation.</h3>
    </footer>
</body>

</html>