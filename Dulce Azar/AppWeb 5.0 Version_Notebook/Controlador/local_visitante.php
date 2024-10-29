<?php
require_once '../Modelo/conex_bd.php';
require_once '../Modelo/local_visitante.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();

$conexion = new Conexion();
$LocalVisitanteControlador = new LocalVisitante($conexion->conectar());
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['local_visitante'])) {
        $LocalVisitanteControlador->conectarUsuario();
    } else if (isset($_POST['apostar2'])) {
        $apuesta = isset($_POST['posicion']) ? $_POST['posicion'] : null;
        if ($apuesta !== null) {
            echo "<h2>Apostaste por: " . htmlspecialchars($apuesta) . "</h2>";
            $LocalVisitanteControlador->procesarApuesta($apuesta);
        } else {
            echo "No se ha definido una apuesta.<br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Local Visitante</h1>
</head>

<body>
    <div class="logo-container">
        <img src="../../DulceAzar.png" alt="Logo" id="Logo">
    </div>
</body>

</html>