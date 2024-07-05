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
        $consulta = "INSERT INTO usuarios(username, password, email) VALUES ('$username','$password','$email')";
        return mysqli_query($this->conexion, $consulta);
    }
}
