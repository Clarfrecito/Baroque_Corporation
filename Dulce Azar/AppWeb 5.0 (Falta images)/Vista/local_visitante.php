<!DOCTYPE html>
<html lang="en">
<head>
    <title>Local vs Visitante</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesLV.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <!--
        <img src="https://i.ibb.co/Ny9Nb46/k4u-UAAAAASUVORK5-CYII.png" id="Logo" border="0">
        -->
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
                <br>
            </div>
            <?php
        }
        ?>
        <br><br>
    </main>
    <footer>
        <h3>2024 Dulce Azar. Creado por Baroque Corporation.</h3>
    </footer>
    <audio id="background-music" autoplay loop>
        <source src="../../musica.mp3" type="audio/mpeg">
        Tu navegador no soporta el elemento de audio.
    </audio>
    <!-- Script original -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var audio = document.getElementById('background-music');
            // Recuperar la última posición guardada desde localStorage
            var savedTime = localStorage.getItem('audioTime');
            if (savedTime !== null) {
                audio.currentTime = parseFloat(savedTime);
            }
            // Intentar reproducir el audio automáticamente
            audio.play().catch(function(error) {
                console.error('El audio no se pudo reproducir automáticamente:', error);
            });
            // Guardar la posición actual del audio en localStorage cada vez que cambie
            audio.addEventListener('timeupdate', function() {
                localStorage.setItem('audioTime', audio.currentTime);
            });
            // Escuchar cambios en localStorage para sincronizar entre ventanas/pestañas
            window.addEventListener('storage', function(event) {
                if (event.key === 'audioTime') {
                    audio.currentTime = parseFloat(event.newValue);
                }
            });
            // Guardar la posición cuando el usuario deja la página
            window.addEventListener('beforeunload', function() {
                localStorage.setItem('audioTime', audio.currentTime);
            });
        });
    </script>
    <!-- Script adicional para manejar la interacción del usuario -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var audio = document.getElementById('background-music');
            // Intentar reproducir el audio automáticamente con manejo de interacción
            function tryToPlayAudio() {
                audio.play().catch(function(error) {
                    console.log('El audio no se pudo reproducir automáticamente, esperando interacción del usuario.');
                    document.body.addEventListener('click', tryToPlayAudio);
                });
            }
            tryToPlayAudio();
        });
    </script>
</body>
</html>