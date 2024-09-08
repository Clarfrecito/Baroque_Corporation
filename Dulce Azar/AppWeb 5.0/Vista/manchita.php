<?php
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Manchita</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesManchita.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
    <header>
            <img src="../../DulceAzar.png" alt="Logo" >  
    </header>
    <main>

        <div class="div-contenedor">
        <h1>El Juego de la Manchita</h1>
            <form method="POST" action="../Controlador/manchita.php">
                <button type="submit" value="Jugar Manchita" name="jugarManchita">Jugar</button>
            </form>

            <?php
            // Comprobación de `isset($_GET['jugar'])`.
            if (isset($_GET['jugar'])) {
                ?>
            <div class="div-contenedor">
                <h3>¿En qué rango de cartas saldrá la manchita?</h3>
                <form method="POST" action="../Controlador/manchita.php">
                    <!--<input type="number" name="posicion" min="1" max="50" required>-->
                    <select name="rango" required>
                        <option value="1-10">1-10</option>
                        <option value="11-20">11-20</option>
                        <option value="21-30">21-30</option>
                        <option value="31-40">31-40</option>
                        <option value="41-50">41-50</option>
                    </select>
                    <button type="submit" name="apostar" value="Apostar">Apostar</button>
                </form>
                <br>
                <form method="POST" action="../Controlador/juegos.php">
                    <button type="submit" name="FinalizarJuego" value="Finalizar Juego">Salir</button>
                </form>
            </div>
                <?php
            }
            ?>
        </div>
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