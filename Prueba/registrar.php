<?php

require_once "conex_bd.php";

class registrar
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function Enviar_Datos()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrarse'])) {
            // Validar que se enviaron todos los campos del formulario
            if (!empty($_POST['name']) && !empty($_POST['contraseña']) && !empty($_POST['email'])) {

                $name = $_POST['name'];
                $contraseña = $_POST['contraseña'];
                $email = $_POST['email'];


                $query = new query($this->conexion);
                $resultado = $query->Guardar_Datos($name, $contraseña, $email);

                if ($resultado) {
                    echo "¡Te registraste correctamente!";
                } else {
                    echo "Ha ocurrido un error";
                }
            } else {
                echo "Por favor complete todos los datos";
            }
        }
    }
}
