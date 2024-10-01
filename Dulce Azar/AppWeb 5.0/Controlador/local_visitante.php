<?php
require_once '../Modelo/conex_bd.php';
require_once '../Modelo/local_visitante.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
class LocalVisitanteControlador extends LocalVisitante
{
    private $conexion;
    public function __construct($conexion)
    {
        parent::__construct($conexion);
        $this->conexion = $conexion;
    }
}
$conexion = new Conexion();
$controlador = new LocalVisitanteControlador($conexion->conectar());
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['local_visitante'])) {
        $controlador->conectarUsuario();
    } else if (isset($_POST['apostar2'])) {
        $apuesta = isset($_POST['posicion']) ? $_POST['posicion'] : null;
        if ($apuesta !== null) {
            echo "Apostaste por el: " . htmlspecialchars($apuesta) . "<br>"; 
            $controlador->procesarApuesta($apuesta);
        } else {
            echo "No se ha definido una apuesta.<br>";
        }
    }
}