<?php

// Incluye el archivo de configuración de la conexión a la base de datos
include 'configuracion.php';

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["ID_Usuario"];
    $email = $_POST["nombre_apellido"];
    $mensaje = $_POST["edad"];
    
    // Prepara la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO prueba (ID_Usuario, nombre_apellido, edad) VALUES ('$nombre', '$email', '$mensaje')";
    
    // Ejecuta la consulta SQL
    if ($conexion->query($sql) === TRUE) {
        echo "Datos insertados correctamente en la base de datos";
    } else {
        echo "Error al insertar datos en la base de datos: " . $conexion->error;
    }
    
    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    // Si alguien trata de acceder a este script directamente, redirige al formulario
    header("Location: prueba.php");
    exit;
}
?>
