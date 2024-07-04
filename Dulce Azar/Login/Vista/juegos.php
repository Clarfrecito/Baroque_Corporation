<?php
//include "../Utiles/verificar_sesion.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Menu</title>
</head>
<body>
    <header>
        <h1>Dulce Azar</h1>
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