<?php
require_once "conex_bd.php";
require_once "query.php";
require_once "registrar.php";
$registrar = new registrar($conexion);
$registrar->Enviar_Datos();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registrarse</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Dulce Azar</h1>
    </header>
    <main>
        <form method="post">
            <h1>¡Registrate!</h1>
            <input type="text" name="name" placeholder="Nombre completo">
            <br>
            <input type="password" name="contraseña" placeholder="Contraseña">
            <br>
            <input type="email" name="email" placeholder="Correo electronico">
            <br>
            <button name=registrarse>Registrarse</button>
        </form>
<!--
<head>
    <title>Iniciar Sesion</title>
    <meta charset="utf-8">
</head>
    <form method= "post">
        <h1>¡Logueate!</h1>
        <input type="text" name="name" placeholder="Usuario">
        <br>
        <input type="password" name="contraseña" placeholder="Contraseña">
        <br>
        <button name = loguearse>Loguearse</button>
        <br>
    </form>
-->
    </main>
    <footer>
        <p>2024 Dulce Azar. Creado por Baroque Corporation.</p>
    </footer>
</body>

</html>