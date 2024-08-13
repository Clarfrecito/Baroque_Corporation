<?php
require_once '../Modelo/conex_bd.php';
require_once '../Modelo/manchita.php';
require_once '../Utiles/verificar_sesion.php';

verificar_sesion();

class ManchitaControlador extends Manchita {
    public function __construct($conexion) {
        parent::__construct($conexion);
    }
}

$conexion = new Conexion(); 
$jugar = new ManchitaControlador($conexion->conectar());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['jugarManchita'])) {
        // Cuando el usuario presiona "Jugar Manchita", redirige con un parámetro `jugar=1` en la URL.
        header("Location: ../Vista/manchita.php?jugar=1");
        exit();
    } elseif (isset($_POST['apostar'])) {
        $apuesta = isset($_POST['posicion']) ? $_POST['posicion'] : null;
        if ($apuesta !== null) {
            echo "Apostaste por la posición " . htmlspecialchars($apuesta) . "<br>"; // Protección contra XSS
            $jugar->procesarApuesta($apuesta);
        } else {
            echo "No se ha definido una apuesta.<br>";
        }
    }
}
