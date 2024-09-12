<?php
require_once 'conex_bd.php';
require_once 'juegos.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();

class LocalVisitante extends Juegos
{
    private $conexion;

    public function __construct($conexion)
    {
        parent::__construct($conexion);
        $this->conexion = $conexion;
    }

    public function procesarApuesta($apuesta)
    {
        // Definir las cartas y sus valores según el truco en un solo array asociativo
        $cartas = array(
            "1 de Espadas" => 14,
            "1 de Bastos" => 13,
            "7 de Espadas" => 12,
            "7 de Oros" => 11,
            "3 de Oros" => 10,
            "3 de Copas" => 10,
            "3 de Espadas" => 10,
            "3 de Bastos" => 10,
            "2 de Oros" => 9,
            "2 de Copas" => 9,
            "2 de Espadas" => 9,
            "2 de Bastos" => 9,
            "1 de Copas" => 8,
            "1 de Oros" => 8,
            "12 de Oros" => 7,
            "12 de Copas" => 7,
            "12 de Espadas" => 7,
            "12 de Bastos" => 7,
            "11 de Oros" => 6,
            "11 de Copas" => 6,
            "11 de Espadas" => 6,
            "11 de Bastos" => 6,
            "10 de Oros" => 5,
            "10 de Copas" => 5,
            "10 de Espadas" => 5,
            "10 de Bastos" => 5,
            "7 de Copas" => 4,
            "7 de Bastos" => 4,
            "6 de Oros" => 3,
            "6 de Copas" => 3,
            "6 de Espadas" => 3,
            "6 de Bastos" => 3,
            "5 de Oros" => 2,
            "5 de Copas" => 2,
            "5 de Espadas" => 2,
            "5 de Bastos" => 2,
            "4 de Oros" => 1,
            "4 de Copas" => 1,
            "4 de Espadas" => 1,
            "4 de Bastos" => 1
        );

        $cartas_sacadas = array();
        $posiciones = array("Local", "Visitante");

        for ($i = 0; $i < 2; $i++) {
            if (count($cartas) == 0) {
                break;
            }
            $numero = array_rand($cartas);
            $sale = $numero;
            $valor = $cartas[$numero];
            unset($cartas[$numero]);
            $cartas_sacadas[] = array("carta" => $sale, "valor" => $valor);
            echo " {$posiciones[$i]}: $sale<br>";
        }

        // Verificar si las dos cartas tienen el mismo valor
        if ($cartas_sacadas[0]['valor'] === $cartas_sacadas[1]['valor']) {
            $carta_ganadora=null;
            $empate = "Empate";
        } else {
            // Determinar la carta ganadora
            $carta_ganadora = null;
            $valor_maximo = -1;
            $posicion_ganadora = null;
            foreach ($cartas_sacadas as $index => $carta) {
                if ($carta['valor'] > $valor_maximo) {
                    $valor_maximo = $carta['valor'];
                    $carta_ganadora = $carta['carta'];
                    $posicion_ganadora = $posiciones[$index];
                }
            }
        }
        if ($carta_ganadora !== null) {
            echo "El ganador es el $posicion_ganadora con la carta $carta_ganadora<br>";
            if ($posicion_ganadora == "Local") {
                $ganancia = ($apuesta == $posicion_ganadora) ? 2000 : -1000;
                if ($ganancia == 2000) {
                    echo "Ganaste<br>";
                    $this->ganancias($ganancia);
                } else {
                    echo "Perdiste<br>";
                    $this->ganancias($ganancia);
                }
            } else if ($posicion_ganadora == "Visitante") {
                $ganancia = ($apuesta == $posicion_ganadora) ? 2000 : -1000;
                if ($ganancia == 2000) {
                    echo "Ganaste<br>";
                    $this->ganancias($ganancia);
                } else {
                    echo "Perdiste<br>";
                    $this->ganancias($ganancia);
                }
            }
        } else {
            echo "¡Es un Empate!<br>";
            $ganancia = ($apuesta == $empate) ? 2000 : -1000;
            if ($ganancia == 2000) {
                echo "Ganaste<br>";
                $this->ganancias($ganancia);
            } else {
                echo "Perdiste<br>";
                $this->ganancias($ganancia);
            }
        }
    }


    public function conectarUsuario()
    {
        $usuario = $_SESSION['username'];
        // Primero, verificar si el usuario ya existe en la tabla local_visitante
        $sql = "SELECT id FROM local_visitante WHERE usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // El usuario ya existe, así que actualiza la fila con los nuevos caramelos
            $sql = "SELECT caramelos FROM local_visitante WHERE usuario = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // El usuario ya tiene un registro, actualizar la cantidad de caramelos
                $row = $result->fetch_assoc();
                $caramelos = $row['caramelos'];
                if ($stmt->execute()) {
                    // Redirigir al usuario después de la actualización
                    header("Location: ../Vista/local_visitante.php?jugar2=1");
                    exit();
                } else {
                    echo "Error al actualizar los caramelos: " . $stmt->error;
                }
            }
        } else {
            // El usuario no existe, así que inserta un nuevo registro
            $caramelos = 1000;
            $sql = "INSERT INTO local_visitante (usuario, caramelos) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("si", $usuario, $caramelos);

            if ($stmt->execute()) {
                // Redirigir al usuario después de la inserción
                header("Location: ../Vista/local_visitante.php?jugar2=1");
                exit();
            } else {
                echo "Error al insertar el registro: " . $stmt->error;
            }
        }
        $stmt->close();
    }

    public function ganancias($ganancia)
    {
        $usuario = $_SESSION['username'];
        // Determinar la cantidad de caramelos a sumar o restar
        $caramelos = $ganancia;
        // Imprimir valores para depuración
        echo "Ganancia: " . $ganancia . "<br>";
        echo "Caramelos a sumar/restar: " . $caramelos . "<br>";
        // Primero, verificar si el usuario ya tiene un registro en la tabla manchita
        $sql = "SELECT caramelos FROM local_visitante WHERE usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // El usuario ya tiene un registro, actualizar la cantidad de caramelos
            $row = $result->fetch_assoc();
            $caramelosActuales = $row['caramelos'];
            $newCaramelos = $caramelosActuales + $caramelos;
            // Imprimir valores para depuración
            echo "Caramelos actuales: " . $caramelosActuales . "<br>";
            echo "Caramelos nuevos: " . $newCaramelos . "<br>";
            $sql = "UPDATE local_visitante SET caramelos = ? WHERE usuario = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("is", $newCaramelos, $usuario);
            if ($stmt->execute()) {
                echo "Caramelos actualizados correctamente: " . $newCaramelos . "<br>";
            } else {
                echo "Error al actualizar caramelos: " . $stmt->error;
            }
        } else {
            // El usuario no tiene un registro, insertar uno nuevo
            $sql = "INSERT INTO local_visitante (usuario, caramelos) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("si", $usuario, $caramelos);

            if ($stmt->execute()) {
                echo "Registro de caramelos creado correctamente.";
            } else {
                echo "Error al crear el registro: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Local/Visitante</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Vista/stylesManchita.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <form action=../Vista/local_visitante.php>
        <div class="botonJugar">
            <button>Volver a Jugar</button>
        </div>
    </form>
    <audio id="background-music" autoplay loop>
        <source src="../../musica.mp3" type="audio/mpeg">
        Tu navegador no soporta el elemento de audio.
    </audio>
    <!-- Script original -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var audio = document.getElementById('background-music');
            // Recuperar la última posición guardada desde localStorage
            var savedTime = localStorage.getItem('audioTime');
            if (savedTime !== null) {
                audio.currentTime = parseFloat(savedTime);
            }
            // Intentar reproducir el audio automáticamente
            audio.play().catch(function (error) {
                console.error('El audio no se pudo reproducir automáticamente:', error);
            });
            // Guardar la posición actual del audio en localStorage cada vez que cambie
            audio.addEventListener('timeupdate', function () {
                localStorage.setItem('audioTime', audio.currentTime);
            });
            // Escuchar cambios en localStorage para sincronizar entre ventanas/pestañas
            window.addEventListener('storage', function (event) {
                if (event.key === 'audioTime') {
                    audio.currentTime = parseFloat(event.newValue);
                }
            });
            // Guardar la posición cuando el usuario deja la página
            window.addEventListener('beforeunload', function () {
                localStorage.setItem('audioTime', audio.currentTime);
            });
        });
    </script>
    <!-- Script adicional para manejar la interacción del usuario -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var audio = document.getElementById('background-music');
            // Intentar reproducir el audio automáticamente con manejo de interacción
            function tryToPlayAudio() {
                audio.play().catch(function (error) {
                    console.log('El audio no se pudo reproducir automáticamente, esperando interacción del usuario.');
                    document.body.addEventListener('click', tryToPlayAudio);
                });
            }
            tryToPlayAudio();
        });
    </script>
</body>

</html>