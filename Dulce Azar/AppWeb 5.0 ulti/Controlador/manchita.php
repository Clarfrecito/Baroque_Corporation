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
echo "<style>
    h2{
        text-align:center;
        color:gold;
    }
    h3{
        color:white;
        font-weight: bold;
        position: absolute;
        top: 22px;
        left: 1292px;
    }
    h4{
        color: green;
        text-align: right;
        position: absolute;
        top: 50px;
        left: 1225px;
    }
    #carame{
        width:50px;
        height:50px;
        position: absolute;
        top: 0;
        left: 1235px;
    }
     </style>";
  
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
    <style>
        h1 {
            position: absolute;
            top: 0;
            left: 45px;
            margin: 0;
            padding: 30px;
            font-size: 24px;
            color: crimson;
            font-weight: bold;
        }
        .logo-container {
  position: absolute;
  top: 10px;
  left: 0px;
}
#Logo {
  height: 50px; /* Ajusta la altura del logo según sea necesario */
}
    </style>
    <h1>Manchita</h1

</head>

<body>
<div class="logo-container">
<img src="../../DulceAzar.png" alt="Logo" id="Logo">
</div>
</body>

</html>