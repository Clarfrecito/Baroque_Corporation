<?php
session_start();
require_once '../Modelo/conex_bd.php';
require_once '../Modelo/usuario_perfil.php';

// Conexión a la base de datos
$conexion = Conexion::conectar();

// Obtener el nombre de usuario desde la sesión
$username = $_SESSION['username'];
$usuarioPerfil = new UsuarioPerfil($conexion);
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

?>
