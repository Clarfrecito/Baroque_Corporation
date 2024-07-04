<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dulce Azar</h1>
    </header>
    <main>
        <div class="Registro">
            <h2>Registro</h2>
            <form action="Registro-Controlador.php" method="post">
                <input type="text" id="username" name="username" required placeholder="Usuario"><br><br>
                <input type="password" id="password" name="password" required placeholder="Contraseña"><br><br>
                <input type="email" id="email" name="email" required placeholder="Correo Electronico"><br><br>
                <button type="submit" value="Registrarse">Registrarse</button>
            </form>
        </div>
    </main>
    <footer>
        <h3>2024 Dulce Azar. Creado por Baroque Corporation.</h3>
    </footer>
</body>
</html>