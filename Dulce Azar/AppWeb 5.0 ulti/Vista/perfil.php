<?php
require_once '../Modelo/conex_bd.php';
require_once '../Modelo/usuario_perfil.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();

// Conexión a la base de datos
$conexion = Conexion::conectar();
$usuarioPerfil = new UsuarioPerfil($conexion);

// Lógica para cambiar la contraseña
if (isset($_POST['cambiar_contrasena'])) {
    $codigoIngresado = $_POST['codigo'];
    $nuevaContrasena = $_POST['nueva_contrasena'];

    if (isset($_SESSION['codigo_verificacion']) && $codigoIngresado == $_SESSION['codigo_verificacion']) {
        $username = $_SESSION['username'];
        if ($usuarioPerfil->cambiarContrasena($username, $nuevaContrasena)) {
            echo "<p>Contraseña cambiada exitosamente.</p>";
        } else {
            echo "<p>Error al cambiar la contraseña.</p>";
        }
        unset($_SESSION['codigo_verificacion']); // Limpiar el código de verificación
    } else {
        echo "<p>Código de verificación incorrecto.</p>";
    }
}

// Si se recibe la solicitud AJAX para enviar el código
if (isset($_POST['enviar_codigo'])) {
    $username = $_SESSION['username'];
    $correoUsuario = $usuarioPerfil->obtenerCorreoUsuario($username);

    if ($correoUsuario) {
        $codigo = rand(100000, 999999); // Genera un código de verificación
        $_SESSION['codigo_verificacion'] = $codigo;

        // Enviar el correo
        $asunto = "Código de Verificación para Cambio de Contraseña";
        $mensaje = "Tu código de verificación es: $codigo";
        $headers = "From: no-reply@tu-dominio.com";

        if (mail($correoUsuario, $asunto, $mensaje, $headers)) {
            echo "Código enviado al correo electrónico.";
        } else {
            echo "Error al enviar el código.";
        }
    } else {
        echo "No se pudo obtener el correo del usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="stylesP.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<header>
    <?php
        if(isset($_SESSION['username'])){
            $usuario=$_SESSION['username'];
            echo "<h1>$usuario</h1>";
        }else{
            echo "No hay usuario logueado";
        }
    ?>

</header>
<body>
    <div class="div-contenedor">
    <form id="form-cambiar-contrasena" action="perfil.php" method="post">
        <label for="codigo">Código de Verificación:</label>
        <input type="text" name="codigo" id="codigo" required><br>
        <label for="nueva_contrasena">Nueva Contraseña:</label>
        <input type="password" name="nueva_contrasena" id="nueva_contrasena" required><br>

        <button type="submit" name="cambiar_contrasena" value="Cambiar Contraseña">Cambiar Contraseña</button>
    </form>

    <form id="form-enviar-codigo" method="post">
        <button type="submit" value="Enviar Código de Verificación" onclick="enviarCodigo()">Solicitar Codigo   </button>
    </form>
    <form action="menu_principal.php">
                <button type="submit">Volver</button>
                </form>
    </div>
    <div id="mensaje"></div>
    <div id="volume-control" style="margin: 20px;">
    <script>
        function enviarCodigo() {
            $.ajax({
                type: 'POST',
                url: 'perfil.php',
                data: { enviar_codigo: true },
                success: function(response) {
                    $('#mensaje').html(response);
                },
                error: function() {
                    $('#mensaje').html('Error al enviar el código.');
                }
            });
        }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var audio = document.getElementById('background-music');
        var volumeSlider = document.getElementById('volume-slider');

        // Recuperar el volumen guardado desde localStorage
        var savedVolume = localStorage.getItem('audioVolume');
        if (savedVolume !== null) {
            audio.volume = parseFloat(savedVolume);
            volumeSlider.value = savedVolume; // Actualiza el slider con el volumen guardado
        }

        // Intentar reproducir el audio automáticamente
        function tryToPlayAudio() {
            audio.play().catch(function(error) {
                console.log('El audio no se pudo reproducir automáticamente, esperando interacción del usuario.');
                document.body.addEventListener('click', tryToPlayAudio);
            });
        }
        tryToPlayAudio();

        // Guardar la posición actual del audio en localStorage cada vez que cambie
        audio.addEventListener('timeupdate', function() {
            localStorage.setItem('audioTime', audio.currentTime);
        });

        // Escuchar cambios en localStorage para sincronizar entre ventanas/pestañas
        window.addEventListener('storage', function(event) {
            if (event.key === 'audioTime') {
                audio.currentTime = parseFloat(event.newValue);
            } else if (event.key === 'audioVolume') {
                audio.volume = parseFloat(event.newValue);
                volumeSlider.value = event.newValue; // Actualiza el slider con el volumen guardado
            }
        });

        // Guardar la posición y volumen cuando el usuario deja la página
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('audioTime', audio.currentTime);
            localStorage.setItem('audioVolume', audio.volume);
        });

        // Manejar el cambio en el control de volumen
        volumeSlider.addEventListener('input', function() {
            audio.volume = parseFloat(volumeSlider.value);
            localStorage.setItem('audioVolume', audio.volume);
        });
    });
</script>
</body>
</html>
