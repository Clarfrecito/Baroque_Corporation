<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrarse</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesR.css">
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
        <form method="post" action="../Controlador/registrar.php">
        <div>
            <h1>Registrarse</h1>
            <input type="text" name="username" required placeholder="Nombre completo">
            <br>
            <br>
            <input type="password" name="password" required placeholder="Contraseña">
            <br>
            <br>
            <input type="email" name="email" required placeholder="Correo electronico">
            <br>
            <br>
            <button type=submit name=registrarse>Registrarse</button>
        </form>
        </div>
    </main>
</body>
</html>