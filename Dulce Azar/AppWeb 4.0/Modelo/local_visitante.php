<?php
require_once 'conex_bd.php';
require_once 'juegos.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
class LocalVisitante extends Juegos{
    private $conexion;
    public function __construct($conexion)
    {
        parent::__construct($conexion);
        $this->conexion = $conexion;
    }
    public function prioridad(){   
    }
}