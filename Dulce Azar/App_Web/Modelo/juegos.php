<?php
require_once 'conex_bd.php';
require_once 'usuario.php';

class Juegos extends Usuario
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    public function seleccionarJuego($nombre)
    {
        $consulta = "SELECT * FROM juegos WHERE nombre = ?";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function registrarJuego($nombre)
    {
        if (isset($_SESSION['username'])) {
            echo "Esta logeado <br>";
            try {
                $estado = "Activo";
                // Verificar si el juego ya existe
                $sql = "SELECT id FROM juegos WHERE nombre = ?";
                $stmt = $this->conexion->prepare($sql);
                $stmt->bind_param("s", $nombre);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Si el juego ya existe, actualiza su estado
                    $row = $result->fetch_assoc();
                    $id_juego = $row['id'];

                    $sql_update = "UPDATE juegos SET estado = ? WHERE id = ?";
                    $stmt_update = $this->conexion->prepare($sql_update);
                    $stmt_update->bind_param("si", $estado, $id_juego);
                    if ($stmt_update->execute()) {
                        $stmt_update->close();
                        return $id_juego; // Devuelve el id del juego actualizado
                    } else {
                        echo "Error al actualizar el estado del juego: " . $stmt_update->error;
                    }
                    $stmt_update->close();
                } else {
                    // Si el juego no existe, lo inserta como nuevo
                    $sql_insert = "INSERT INTO juegos (nombre, estado) VALUES (?, ?)";
                    $stmt_insert = $this->conexion->prepare($sql_insert);
                    $stmt_insert->bind_param("ss", $nombre, $estado);
                    if ($stmt_insert->execute()) {
                        $stmt_insert->close();
                        return $this->conexion->insert_id; // Devuelve el id del nuevo juego insertado
                    } else {
                        echo "Error al insertar el juego: " . $stmt_insert->error;
                    }
                    $stmt_insert->close();
                }
                $stmt->close();
            } catch (Exception $e) {
                echo "No se pudo registrar el juego: " . $e->getMessage();
            }
        }
        return null;
    }



    public function actualizarEstadoJuego($id_juego, $estado)
    {
        $stmt = $this->conexion->prepare("UPDATE juegos SET estado = ? WHERE id = ?");
        $stmt->bind_param("si", $estado, $id_juego);
        if ($stmt->execute()) {
            echo "Estado del juego actualizado correctamente.";
        } else {
            echo "Error al actualizar el estado del juego.";
        }
        $stmt->close();
    }
    public function iniciarJuego($nombre)
    {
        try {
            $id_juego = $this->registrarJuego($nombre);
            echo "Se registro el juego <br>";
        } catch (Exception $e) {
            echo "No se pudo registrar el juego: " . $e->getMessage();
        }
        if ($id_juego !== null) {
            $_SESSION['id_juego'] = $id_juego;
            $_SESSION['nombre_juego'] = $nombre;
        }
    }
    public function finalizarJuego()
    {
        if (isset($_SESSION['id_juego']) && isset($_SESSION['username'])) {
            $id_juego = $_SESSION['id_juego'];
            $this->actualizarEstadoJuego($id_juego, "Inactivo");
            unset($_SESSION['id_juego']);
            unset($_SESSION['nombre_juego']);
        }
    }

}
