<?php
require_once 'conex_bd.php';
class Usuario 
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }
    
    public function caramelos(){
        //HACER LA SUMA DE LOS CARAMELOS DE CADA JUEGO    
    }
    
    
}