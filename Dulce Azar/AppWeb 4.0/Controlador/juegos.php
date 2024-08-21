<?php
require_once '../Modelo/juegos.php';
require_once '../Modelo/conex_bd.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
class JuegosControlador extends Juegos
{
    public function __construct($conexion)
    {
        parent::__construct($conexion);
    }
}

$conexion = new Conexion();
$juegosControlador = new JuegosControlador($conexion->conectar());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['manchita'])) {
        $nombre_juego = "Manchita";
        $juegosControlador->iniciarJuego($nombre_juego);
        header("Location: ../Vista/manchita.php");
        exit();
    } elseif (isset($_POST['local/visitante'])) {
        $nombre_juego = "Local/Visitante";
        $juegosControlador->iniciarJuego($nombre_juego);
        header("Location: ../Vista/local_visitante.php");
        exit();
    } elseif (isset($_POST['FinalizarJuego']) || !isset($_SESSION['username'])) {
        $juegosControlador->finalizarJuego();
        header("Location: ../Vista/seleccionar_juegos.php");
        exit();
    }
}

