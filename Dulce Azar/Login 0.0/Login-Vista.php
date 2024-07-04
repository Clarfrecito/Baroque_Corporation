<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dulce Azar</h1>
    </header>
    <main>
        <div class="Inicio de Sesion">
            <h2>Inicio de Sesion</h2>
            <form action="Login-Controlador.php" method="post">
                <input type="text" id="username" name="username" required placeholder="Usuario"><br><br>
                <input type="password" id="password" name="password" required required placeholder="Contraseña"><br><br>
                <button type="submit" value="Iniciar sesión">Iniciar Sesion</button>
            </form>
        </div>
    </main>
    <footer>
        <h3>2024 Dulce Azar. Creado por Baroque Corporation.</h3>
    </footer>
</body>
</html>