<?php
require_once 'conex_bd.php';
class Usuario
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }
    public function registrarse(){}

    public function login(){}

    public function logout(){}
}
