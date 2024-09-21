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

if (isset($_GET['juego1'])) {
    $nombre_juego = $_GET['juego1'];
    $juegosControlador->iniciarJuego($nombre_juego);
    header("Location: ../Vista/manchita.php");
    exit();
} elseif (isset($_GET['juego2'])) {
    $nombre_juego = $_GET['juego2'];
    $juegosControlador->iniciarJuego($nombre_juego);
    header("Location: ../Vista/local_visitante.php");
    exit();
} elseif (isset($_GET['juego3'])) {
    $nombre_juego = $_GET['juego3'];
    $juegosControlador->iniciarJuego($nombre_juego);
    header("Location: ../Vista/otro_juego.php");
    exit();
}
