<?php
session_start();
require_once '../Modelo/manchita.php';
require_once '../Modelo/manchita_bd.php';
require_once '../Utiles/verificar_sesion.php';

verificar_sesion();

class JuegosControlador {
    private $manchitaModelo;

    public function __construct($manchitaModelo) {
        $this->manchitaModelo = $manchitaModelo;
    }

    public function jugar($id_usuario, $posicionesSeleccionadas, $posicionesExactas) {
        $manchita = new manchita();
        $contador = $manchita->encontrarManchita();
        $carta = '1 de oros';
        $numero = $contador;
        $estado = 'jugado';
        
        $this->manchitaModelo->registrarJuego($id_usuario, $contador, $carta, $numero, $estado);

        // Calcular las ganancias basadas en las posiciones seleccionadas
        $ganancia = 0;
        $caramelos = 20; // Ejemplo de caramelos apostados
        if (in_array($contador, $posicionesExactas)) {
            $ganancia = $caramelos * (10 - count($posicionesExactas)) * 0.075;
        } elseif (in_array($contador, $this->convertirRangos($posicionesSeleccionadas))) {
            $ganancia = $caramelos * 2;
        }

        return ['posicion' => $contador, 'ganancia' => $ganancia];
    }

    private function convertirRangos($posicionesSeleccionadas) {
        $rangos = [];
        foreach ($posicionesSeleccionadas as $posicion) {
            switch ($posicion) {
                case '1-12':
                    $rangos = array_merge($rangos, range(1, 12));
                    break;
                case '13-24':
                    $rangos = array_merge($rangos, range(13, 24));
                    break;
                case '25-36':
                    $rangos = array_merge($rangos, range(25, 36));
                    break;
                case '37-48':
                    $rangos = array_merge($rangos, range(37, 48));
                    break;
            }
        }
        return $rangos;
    }
}

$manchitaModelo = new manchita_bd();
$juegosControlador = new JuegosControlador($manchitaModelo);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jugar']) && isset($_SESSION['id_usuario'])) {
    $posicionesSeleccionadas = isset($_POST['posiciones']) ? $_POST['posiciones'] : [];
    $posicionesExactas = isset($_POST['posicion_exacta']) ? explode(',', $_POST['posicion_exacta']) : [];
    $posicionesExactas = array_map('trim', $posicionesExactas); // Remover espacios adicionales

    $resultado = $juegosControlador->jugar($_SESSION['id_usuario'], $posicionesSeleccionadas, $posicionesExactas);
    echo "<script>var resultado = '" . $resultado['posicion'] . "'; var ganancia = '" . $resultado['ganancia'] . "';</script>";
    // Redirigir a la vista juegos.php
    header("Location: ../Vista/juegos.php");
    exit();
}
?>
