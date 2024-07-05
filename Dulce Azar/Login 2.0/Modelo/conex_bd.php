<?php

class Conexion
{
    private static $conexion = null;

    public static function conectar()
    {
        if (self::$conexion == null) {
            self::$conexion = new mysqli("localhost", "root", "", "dulce_azar");
            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            } else {
                echo "Conexión exitosa";
            }
        }
        return self::$conexion;
    }

    public static function cerrar()
    {
        if (self::$conexion != null) {
            self::$conexion->close();
            self::$conexion = null;
        }
    }
}
