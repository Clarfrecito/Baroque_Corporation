<!DOCTYPE html>
<html>
<head>
    <title>Registrarse</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles.css">

</head>
<body>
    <form method="post" action="../Controlador/registrar.php">
        <h1>¡Registrate!</h1>
        <div>
        <h2>¡Registrate!</h2>
        <input type="text" name="username" placeholder="Nombre completo">
            <br>
            <br>
            <input type="password" name="password" placeholder="Contraseña">
            <br>
            <br>
            <input type="email" name="email" placeholder="Correo electronico">
            <br>
            <br>
        <button type=submit name=registrarse>Registrarse</button>
    </form>
    </div>
    <?php
    if (isset($mensaje)) {
        echo "<p>$mensaje</p>";
    }
       // if (isset($registrado) && $registrado) {
            //   echo '<br><a href="Logout.php">Cerrar Sesión</a>';
       // }
    ?>
</body>
</html>