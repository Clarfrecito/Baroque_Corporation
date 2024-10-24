<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Local vs Visitante</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
  <header>
        <img src="../../DulceAzar.png" id="Logo" border="0">
  </header>
  <main>
    <h1>Local/Visitante</h1>
    <div class="div-contenedor">
      <h2>Juega al L/V</h2>
      <form method="POST" action="../Controlador/local_visitante.php">
        <button type="submit" value="Jugar L/V" name="local_visitante">Jugar</button>
      </form>
      <form method="POST" action="../Vista/menu_principal.php">
        <button type="submit" value="Salir del Juego" name="Salir">Salir</button>
      </form>
    </div>
    <?php
    if (isset($_GET['jugar2'])) {
    ?>
      <div class="div-contenedor">
        <h3>¿Quien Ganará? o.. ¿Empatarán?</h3>
        <form method="POST" action="../Controlador/local_visitante.php">
          <select name="posicion" required>
            <option value="Local">Local</option>
            <option value="Visitante">Visitante</option>
            <option value="Empate">Empate</option>
          </select>
          <button type="submit" name="apostar2" value="Apostar">Apostar</button>
        </form>
      </div>
    <?php
    }
    ?>
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
    margin-top: 25px;
  }

  main {
    margin-top: 125px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  footer {
    margin-top: 103px;
    color: #fff;
    text-align: center;
  }

  button {
    box-sizing: border-box;
    border: 0;
    border-radius: 20px;
    color: var(--secondary-color);
    padding: 1rem;
    background: var(--primary-color);
    transition: 0.2s background;
    margin-bottom: 15px;
    margin-left: 25px;
    margin-right: 25px;
    height: auto;
    width: 145px;
    font-size: 15px;
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
    padding: 20px;
    background-color: #1E1E1E;
    border: 3px solid rgb(255, 255, 255);
    border-radius: 5%;
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