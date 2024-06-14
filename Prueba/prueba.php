<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prueba.css">
    <title>Prueba</title>
</head>
<body>
    <header>

    </header>
    <main>
        <h1>¡Hola, mundo desde HTML!</h1>
        <?php
        echo "¡Hola, mundo desde PHP!";
        ?>
            <h2>Formulario de Contacto</h2>
    <form action="procesar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>
        
        <input type="submit" value="Enviar">
    </form> 
    </main>
    <footer>
        <h3 id="tumadre" >Creado por Baroque Corporation</h3>
    </footer>
</body>
</html>