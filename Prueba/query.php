<?php

require_once "conex_bd.php"; //para utilizar clases

class query
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function Guardar_Datos($name, $contraseña, $email)
    {
        // Establecer la consulta SQL para guardar los datos en la base de datos
        $consulta = "INSERT INTO usuarios(`id`, `username`, `password`, `email`) VALUES (?, ?, ?, ?)";
        // Preparar la consulta  
        $stmt = mysqli_prepare($this->conexion, $consulta);
        //verifica si la consulta fue preparada correctamente
        if ($stmt === false) {
            die('Error al preparar la consulta: ' . mysqli_error($this->conexion));
        }
        // Vincular parámetros a la consulta
        mysqli_stmt_bind_param($stmt, "sss", $name, $contraseña, $email);

        // Ejecutar la consulta
        $resultado = mysqli_stmt_execute($stmt);

        if ($resultado === false) {
            die('Error al ejecutar la consulta: ' . mysqli_error($this->conexion));
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);

        return $resultado;
    }
}
