<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Manchita</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <img src="../../DulceAzar.png" alt="Logo">
  </header>
  <main>

    <div class="div-contenedor">
      <h1>El Juego de la Manchita</h1>
      <form method="POST" action="../Controlador/manchita.php">
        <button type="submit" value="Jugar Manchita" name="jugarManchita">Jugar</button>
      </form>
      <form method="POST" action="../Vista/menu_principal.php">
        <button type="submit" value="Salir del Juego" name="Salir">Salir</button>
      </form>
    </div>
    <?php
    if (isset($_GET['jugar'])) {
    ?>
      <div class="div-contenedor">
        <h3>¿En qué rango de cartas saldrá la manchita?</h3>
        <form method="POST" action="../Controlador/manchita.php">
          <select name="rango" required>
            <option value="1-10">1-10</option>
            <option value="11-20">11-20</option>
            <option value="21-30">21-30</option>
            <option value="31-40">31-40</option>
            <option value="41-50">41-50</option>
          </select>
          <button type="submit" name="apostar" value="Apostar">Apostar</button>
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
    --arrow-bg: rgb(0, 0, 0);
    --arrow-icon: url(https://upload.wikimedia.org/wikipedia/commons/9/9d/Caret_down_font_awesome_whitevariation.svg);
    --option-bg: rgb(0, 0, 0);
    --select-bg: rgb(0, 0, 0);
  }

  body {
    font-family: "Questrial", sans-serif;
    background-color: #1E1E1E;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
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
    margin-top: 20px;
    height: auto;
    width: 90px;
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
    padding: 40px;
    background-color: #1E1E1E;
    border: 3px solid rgb(255, 255, 255);
    margin-bottom: 3 0px;
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
    margin-top: 10px;
    height: 20%;
    position: absolute;
    top: 0;
    right: 0;
  }

  select {
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
    margin-top: 20px;
    height: auto;
    width: 200px;
    font-size: 15px;
    cursor: pointer;
    text-align: center;
    font-weight: bold;
  }

  select:focus {
    background-color: var(--secondary-color);
    color: var(--hover-color);
  }
</STYLE>

</html>