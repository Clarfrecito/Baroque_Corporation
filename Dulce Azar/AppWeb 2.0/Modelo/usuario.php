<?php
require_once 'conex_bd.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }
    public function registrar($username, $email, $password)
    {
        $consulta = "INSERT INTO usuarios(username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("sss", $username, $password, $email);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            header("Location: ../Vista/login.php");
            exit();
        } else {
            echo "Ha ocurrido un error al registrar.";
        }
        $stmt->close();

        return $stmt->execute();
    }
    public function jugar()
    {
        $consulta = "SELECT * FROM juegos";
        return mysqli_query($this->conexion, $consulta);
    }
}