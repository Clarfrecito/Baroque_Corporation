<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="stylesL.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <main>
    <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" alt="k4u-UAAAAASUVORK5-CYII" border="0">  
        <div class="Inicio de Sesion">
            <h2>Inicio de Sesion</h2>
            <form action="../Vista/juegos.php" method="post">
                <input type="text" id="username" name="username" required placeholder="Usuario"><br><br>
                <input type="password" id="password" name="password" required required placeholder="Contraseña"><br><br>
                <button type="submit" value="Iniciar sesión">Iniciar Sesion</button>
            </form>
            <form action="../index.php" method="get">
                <button type="submit">Menu</button>
            </form>
        </div>
    </main>
</body>

</html>