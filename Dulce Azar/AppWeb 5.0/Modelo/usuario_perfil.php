<?php
require_once 'conex_bd.php';

class UsuarioPerfil
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerCorreoUsuario($username)
    {
        $sql = "SELECT email FROM usuarios WHERE username = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['email'];
        } else {
            return false;
        }
    }

    public function cambiarContrasena($username, $nuevaContrasena)
    {
        $sql = "UPDATE usuarios SET password = ? WHERE username = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss", $nuevaContrasena, $username);
        return $stmt->execute();
    }
}
?>
