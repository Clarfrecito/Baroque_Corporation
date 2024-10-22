<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio de Sesion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a href="../index.php">
            <img src="../../DulceAzar.png" alt="Logo">
        </a>
    </header>
    <main>
        <form action="../Controlador/registrar.php" method="post">
            <div class="div-contenedor">
                <h1>Inicio de Sesion</h1>
                <input type="text" id="usernameOrEmail" name="usernameOrEmail" required placeholder="Usuario/Email"><br><br>
                <input type="password" id="password" name="password" required placeholder="Contraseña"><br><br>
                <button type="submit" name="login">Iniciar Sesion</button>
        </form>
        </div>
    </main>
    <footer>
        <h3>2024 Dulce Azar. Creado por Baroque Corporation.</h3>
    </footer>
</body>
<style>
    :root {
        --primary-color: rgb(0, 0, 0);
        --secondary-color: #00BAFF;
        --hover-color: rgb(255, 255, 255);
    }

    body {
        font-family: "Questrial", sans-serif;
        background-color: #1E1E1E;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    header {
        margin-top: 1%;
    }

    main {
        margin-top: 3%;
    }

    footer {
        margin-top: 3%;
        color: #fff;
        text-align: center;
    }

    button {
        box-sizing: border-box;
        border: 0;
        border-radius: 20%;
        color: var(--secondary-color);
        padding: 1rem;
        background: var(--primary-color);
        transition: 0.2s background;
        margin-bottom: 15%;
        height: auto;
        width: 50%;
        font-size: 1rem;
        cursor: pointer;
        text-align: center;
        font-weight: bold;
    }

    button:hover {
        background-color: var(--secondary-color);
        color: var(--hover-color);
    }

    .div-contenedor {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: auto;
        background-color: #1E1E1E;
        border: 3px solid rgb(255, 255, 255);
        border-radius: 5%;
        width: 100%;
        margin-top: 45%
    }

    h1 {
        font-size: 2rem;
        font-weight: normal;
        letter-spacing: 0.025em;
    }

    h3 {
        font-size: 1rem;
        color: rgb(150, 150, 150);
        font-weight: normal;
    }

    input {
        border-radius: 10px;
        height: 25px;
        background-color: #1E1E1E;
        cursor: pointer;
        border: 1.5px solid white;
        width: 150px;
    }

    input:focus {
        color: black;
        background-color: white;
        cursor: pointer;
    }

    img {
        margin-top: 10px;
        height: 20%;
        position: absolute;
        top: 0;
        right: 0;
    }
</style>

</html>