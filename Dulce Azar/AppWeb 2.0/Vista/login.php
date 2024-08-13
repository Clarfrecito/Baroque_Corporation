<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de Sesion</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesL.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="../index.php">
            <img src="../../DulceAzar.png" alt="Logo" >  
        </a>
    </header>
    <main>
        <form action="../Controlador/registrar.php" method="post">
        <div class="Inicio de Sesion">
            <h1>Inicio de Sesion</h2>
            <input type="text" id="username" name="username" required placeholder="Usuario"><br><br>
            <input type="password" id="password" name="password" required placeholder="Contraseña"><br><br>
            <button type="submit" name="login">Iniciar Sesion</button>
        </form>
        </div>
    </main>
    <footer>
        <h3>2024 Dulce Azar. Creado por Baroque Corporation.</h3>
    </footer>
</body>
</html>