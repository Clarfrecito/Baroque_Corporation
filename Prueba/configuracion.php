<?php
// Configuración de la conexión a la base de datos
$host = "localhost"; // Host de la base de datos (puede ser una dirección IP)
$usuario = "root"; // Nombre de usuario de la base de datos
$contrasena = ""; // Contraseña de la base de datos
$nombre_base_de_datos = "dulce_azar"; // Nombre de la base de datos

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $nombre_base_de_datos);

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}
?>