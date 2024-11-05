<!DOCTYPE html>
<html lang="es">

<head>
  <title>Menu</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <img src="../DulceAzar.png" alt="Logo">
  </header>
  <main>
    <div class="div-contenedor">
      <h1>Menú<h1>
          <form action="Vista/registrarse.php" method="get">
            <button type="submit">Registrarse</button>
          </form>
          <form action="Vista/login.php" method="get">
            <button type="submit" value="Iniciar sesión">Iniciar Sesion</button>
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
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  footer {
    margin-top: 2.5%;
    text-align: center;
    padding: 1rem 0;
}


button {
        font-family: 'Questrial', sans-serif;
        font-size: 16px;
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
        width: 100%;
        font-size: 1rem;
        cursor: pointer;
        text-align: center;
        font-weight: bold;
    }

    button:hover {
        background-color: var(--secondary-color);
        color: var(--hover-color);
    }

    input:focus {
        color: black;
        background-color: white;
        cursor: pointer;
    }

  .div-contenedor {
  
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
    font-size: 2rem;
    font-weight: normal;
    letter-spacing: 0.025em;
    color: white;
  }

  h3 {
    font-size: 1rem;
    color: rgb(150, 150, 150);
    font-weight: normal;
  }

  img {
    height: 30%;
    width: 30%;
  }
</style>

</html>