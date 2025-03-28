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
        <div class="div-contenedor">
            <form method="post" action="../Controlador/registrar.php">
                <h1>Inicio de Sesion</h1>
                <input type="text" id="usernameOrEmail" name="usernameOrEmail" required
                    placeholder="Usuario/Email"><br><br>
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
        --secondary-color: rgb(61, 12, 8);
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
    background-image: url('../../Fondo.PNG');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }

    header {
        margin-top: 1%;
    }

    main {
        margin-top: 3%;
    }

    footer {
    margin-top: 2.9%;
    text-align: center;
    padding: 1rem 0;
}

    button {
        font-family: 'Questrial', sans-serif; /* Usa la fuente Questrial */
        font-size: 16px; /* Ajusta el tamaño de la fuente según lo necesites */
        letter-spacing: 0.075em;
        box-sizing: border-box;
        border: 0;
        border-radius: 5px;
        color: white;
        padding: 1rem;
        background: rgb(185, 19, 9);
        transition: 0.2s background;
        margin-top: 10%;
        margin-bottom: 5%;
        height: auto;
        width: 75%;
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
        margin-top: 30%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2vw;
        background-color: rgba(0, 0, 0, 0.7);
        width: 80%;
        max-width: 1200px;
        min-height: 25vh;
    }

    h1 {
        font-size: 1.75rem;
        font-weight: normal;
        letter-spacing: 0.025em;
        margin-bottom: 20%;
        color: white;
    }

    h3 {
        font-size: 1rem;
        color: rgb(150, 150, 150);
        font-weight: normal;
    }

    input {
        font-family: 'Questrial', sans-serif; /* Usa la fuente Questrial */
        font-size: 16px; /* Ajusta el tamaño de la fuente según lo necesites */
        letter-spacing: 0.075em;
        border-radius: 10px;
        height: 25px;
        background-color: rgb(15, 15, 15, 0.5);
        cursor: pointer;
        border: 1.5px solid white;
        width: 90%;
        color: white;
        border-radius: 5px;
        padding: 8px;
        font-size: 16px;
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