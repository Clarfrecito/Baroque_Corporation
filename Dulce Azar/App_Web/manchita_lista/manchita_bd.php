<?php
require_once 'conex_bd.php';

class manchita_bd {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function registrarJuego($id_usuario, $contador, $carta, $numero, $estado) {
        $sql = "INSERT INTO manchita (id_usuario, contador, carta, numero, estado) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("iisss", $id_usuario, $contador, $carta, $numero, $estado);
        return $stmt->execute();
    }

    public function obtenerJuegos($id_usuario) {
        $sql = "SELECT * FROM juegos WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $juegos = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $juegos;
    }
}
