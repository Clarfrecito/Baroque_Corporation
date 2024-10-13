<?php
require_once '../Modelo/usuario_perfil.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $codigo = $_POST['codigo'];
    $nuevaContrasena = $_POST['nueva_contrasena'];
    $conexion = Conexion::conectar();
    $usuarioPerfil = new UsuarioPerfil($conexion);

    if ($usuarioPerfil->verificarCodigo($email, $codigo)) {
        $usuarioPerfil->cambiarContrasena($email, $nuevaContrasena);
        echo "Contraseña cambiada exitosamente.";
    } else {
        echo "Código de verificación incorrecto.";
    }
}
?>

<form method="POST" action="">
    <input type="email" name="email" required placeholder="Introduce tu email">
    <input type="text" name="codigo" required placeholder="Introduce el código">
    <input type="password" name="nueva_contrasena" required placeholder="Nueva contraseña">
    <button type="submit">Cambiar contraseña</button>
</form>