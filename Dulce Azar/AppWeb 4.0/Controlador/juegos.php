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
//iniciar el juego sin seleccionar_juegos.php
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
} elseif (isset($_GET['juego2'])) {
    $nombre_juego = $_GET['juego2'];
    $juegosControlador->iniciarJuego($nombre_juego);
    //header("Location: ../Vista/local_visitante.php");
    exit();
} elseif (isset($_POST['FinalizarJuego']) || isset($_POST['logout'])) {//QUE CIERRE EL JUEGO AL CERRAR SESION
    $juegosControlador->finalizarJuego();
    header("Location: ../Vista/menu_principal.php");
    exit();
}
