<?php
require_once '../Modelo/conex_bd.php';
require_once '../Utiles/verificar_sesion.php';

class Juegos
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function iniciarJuego($nombre)
    {
        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            $this->registrarSesionJuego($id_usuario, $nombre);
        } else {
            echo "Usuario no autenticado.";
        }
    }

    public function registrarSesionJuego($id_usuario, $nombre)
    {
        $sql = "INSERT INTO juegos (id_usuario, nombre, sesion_juego) VALUES (?, ?, CURRENT_TIMESTAMP)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("is", $id_usuario, $nombre);
        if ($stmt->execute()) {
            echo "Sesión de juego registrada correctamente.";
        } else {
            echo "Error al registrar la sesión de juego: " . $stmt->error;
        }
        $stmt->close();
    }

    public function finalizarJuego($id_juego)
    {
        if (isset($_POST['finalizarJuego'])) {
            $sql = "UPDATE juegos SET sesion_juego = CURRENT_TIMESTAMP WHERE id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $id_juego);
            if ($stmt->execute()) {
                echo "Sesión de juego finalizada correctamente.";
            } else {
                echo "Error al finalizar la sesión de juego: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    public function registrarJuego($nombre)
    {
        if (isset($_SESSION['username'])) {
            try {
                // Verificar si el juego ya existe
                $sql = "SELECT id FROM juegos WHERE nombre = ?";
                $stmt = $this->conexion->prepare($sql);
                $stmt->bind_param("s", $nombre);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // Si el juego ya existe, obtener su ID
                    $row = $result->fetch_assoc();
                    $id_juego = $row['id'];
                } else {
                    // Si el juego no existe, lo inserta como nuevo
                    $sql_insert = "INSERT INTO juegos (nombre) VALUES (?)";
                    $stmt_insert = $this->conexion->prepare($sql_insert);
                    $stmt_insert->bind_param("s", $nombre);
                    if ($stmt_insert->execute()) {
                        $id_juego = $this->conexion->insert_id;
                    } else {
                        echo "Error al insertar el juego: " . $stmt_insert->error;
                        return null;
                    }
                    $stmt_insert->close();
                }
                $stmt->close();
                return $id_juego;
            } catch (Exception $e) {
                echo "No se pudo registrar el juego: " . $e->getMessage();
            }
        }
        return null;
    }
}
