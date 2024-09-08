<?php
require_once '../Utiles/verificar_sesion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menú Principal</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesM.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
    <img src="../../DulceAzar.png" alt="Logo" id="Logo">  
    <h1>Dulce Azar</h1>
    <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Contacto</a></li>
        <li><form method="POST" action="../Controlador/registrar.php"><button type="submit" name="logout">Cerrar Sesión</button></form></li>
    </ul>
    <div class="grid-container">
        <a href="../Controlador/juegos.php?juego1=manchita" class="grid-item1">
        <div class="background-image1">
                <h1><strong>MANCHITA</strong></h1>   
        </div>
        </a>
        <a href="../Controlador/juegos.php?juego2=Local/Visitante" class="grid-item2">
        <div class="background-image2">
                <h1><strong>LOCAL VISITANTE</strong></h1>
        </div>  
        </a>   
        <a href="manchita.php" class="grid-item3">      
        <div class="background-image3">
                <h1><strong>BINGO LOCO</strong></h1>
        </div>
        </a>
        <a href="#" class="grid-item4">
        <div class="background-image4">
                <h1><strong>PROXIMAMENTE</strong></h1>
        </div>
        </a>
    </div>
    <!-- Elemento de audio -->
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