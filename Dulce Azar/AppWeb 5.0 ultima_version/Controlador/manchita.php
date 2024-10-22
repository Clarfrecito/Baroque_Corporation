<?php
require_once '../Modelo/conex_bd.php';
require_once '../Modelo/manchita.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
class ManchitaControlador extends Manchita
{
    public function __construct($conexion)
    {
        parent::__construct($conexion);
    }
}


$conexion = new Conexion();
$controlador = new ManchitaControlador($conexion->conectar());
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['jugarManchita'])) {
        $controlador->conectarUsuario();
    } elseif (isset($_POST['apostar'])) {
        $apuesta = isset($_POST['rango']) ? $_POST['rango'] : null;
        if ($apuesta !== null) {
            echo "<h2>Apostaste por el rango: " . htmlspecialchars($apuesta) . "</h2><br>";
            $mensaje = $controlador->procesarApuesta($apuesta);
            echo "<h2>$mensaje</h2>";
        } else {
            echo "<h3>No se ha definido una apuesta.</h3><br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Manchita</h1>
</head>

<body>
    <div class="logo-container">
        <img src="../../DulceAzar.png" alt="Logo" id="Logo">
    </div>
</body>

</html>