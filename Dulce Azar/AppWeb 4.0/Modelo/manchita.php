<?php
require_once 'conex_bd.php';
require_once 'juegos.php';
require_once '../Utiles/verificar_sesion.php';
verificar_sesion();
class Manchita extends Juegos
{
    private $conexion;
    public function __construct($conexion)
    {
        parent::__construct($conexion);
        $this->conexion = $conexion;
    }
    public function conectarUsuario()
    {
        $usuario = $_SESSION['username'];
        // Primero, verificar si el usuario ya existe en la tabla manchita
        $sql = "SELECT id FROM manchita WHERE usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // El usuario ya existe, así que actualiza la fila con los nuevos caramelos
            $sql = "SELECT caramelos FROM manchita WHERE usuario = ?";
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
                    header("Location: ../Vista/manchita.php?jugar=1");
                    exit();
                } else {
                    echo "Error al actualizar los caramelos: " . $stmt->error;
                }
            }
        } else {
            // El usuario no existe, así que inserta un nuevo registro
            $caramelos = 1000;
            $sql = "INSERT INTO manchita (usuario, caramelos) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("si", $usuario, $caramelos);

            if ($stmt->execute()) {
                // Redirigir al usuario después de la inserción
                header("Location: ../Vista/manchita.php?jugar=1");
                exit();
            } else {
                echo "Error al insertar el registro: " . $stmt->error;
            }
        }
        $stmt->close();
    }
    public function procesarApuesta($apuesta)
    {
        if ($apuesta == "1-10") {
            $apuesta = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        } elseif ($apuesta == "11-20") {
            $apuesta = array(11, 12, 13, 14, 15, 16, 17, 18, 19, 20);
        } elseif ($apuesta == "21-30") {
            $apuesta = array(21, 22, 23, 24, 25, 26, 27, 28, 29, 30);
        } elseif ($apuesta == "31-40") {
            $apuesta = array(31, 32, 33, 34, 35, 36, 37, 38, 39, 40);
        } elseif ($apuesta == "41-50") {
            $apuesta = array(41, 42, 43, 44, 45, 46, 47, 48, 49, 50);
        }
        $cartas = array(
            "1 de Oros",
            "2 de Oros",
            "3 de Oros",
            "4 de Oros",
            "5 de Oros",
            "6 de Oros",
            "7 de Oros",
            "8 de Oros",
            "9 de Oros",
            "10 de Oros",
            "11 de Oros",
            "12 de Oros",
            "1 de Copas",
            "2 de Copas",
            "3 de Copas",
            "4 de Copas",
            "5 de Copas",
            "6 de Copas",
            "7 de Copas",
            "8 de Copas",
            "9 de Copas",
            "10 de Copas",
            "11 de Copas",
            "12 de Copas",
            "1 de Espadas",
            "2 de Espadas",
            "3 de Espadas",
            "4 de Espadas",
            "5 de Espadas",
            "6 de Espadas",
            "7 de Espadas",
            "8 de Espadas",
            "9 de Espadas",
            "10 de Espadas",
            "11 de Espadas",
            "12 de Espadas",
            "1 de Bastos",
            "2 de Bastos",
            "3 de Bastos",
            "4 de Bastos",
            "5 de Bastos",
            "6 de Bastos",
            "7 de Bastos",
            "8 de Bastos",
            "9 de Bastos",
            "10 de Bastos",
            "11 de Bastos",
            "12 de Bastos",
            "Comodin 1",
            "Comodin 2"
        );
        echo '<style>
                .cartas {
                    display: grid;
                    grid-template-columns: repeat(10, 1fr);
                    gap: 10px;
                    width: 100%;
                    margin-top: 20px;
                }

                .carta {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    border: 1px solid white;
                    width: 75px;
                    height: 150px;
                    background-color: #fff;
                    padding: 5px;
                    box-sizing: border-box;
                    overflow: hidden;
                }

                .carta img {
                    max-width: 100%;
                    max-height: 100%;
                    object-fit: contain;
                }

/* Asegúrate de que no haya estilos que afecten la posición de la imagen fuera del contenedor */
                img {
                    position: relative;
                }
        </style>';

        echo '<div class="cartas">'; // Iniciar el contenedor de la grilla

        for ($i = 0; $i < 50; $i++) {
            if (count($cartas) == 0) {
                break;
            }
            $numero = rand(0, count($cartas) - 1);
            $sale = $cartas[$numero];
            array_splice($cartas, $numero, 1);
            $posicion = $i + 1;

            $imagen = strtolower(str_replace(' ', '_', $sale)) . '.png'; // Construir el nombre de archivo de la imagen
            echo '<div class="carta">'; // Iniciar el div de la carta
            echo '<img src="../images/' . $imagen . '" alt="' . $sale . '">'; // Mostrar la imagen de la carta
            echo '<p>Posición ' . $posicion . ': ' . $sale . '</p>'; // Mostrar la posición y nombre de la carta

            if ($sale == "1 de Oros") {
                echo '<p>La manchita salió en la posición ' . $posicion . '</p>';
                $ganancia = in_array($i + 1, $apuesta) ? 2000 : -1000;
                $this->ganancias($ganancia);
                echo '</div>'; // Cerrar el div de la carta antes de salir
                echo '</div>'; // Cerrar el contenedor de la grilla
                return; // Salir de la función después de encontrar la carta
            }

            echo '</div>'; // Cerrar el div de la carta
        }

        echo '</div>'; // Cerrar el contenedor de la grilla
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
        $sql = "SELECT caramelos FROM manchita WHERE usuario = ?";
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
            $sql = "UPDATE manchita SET caramelos = ? WHERE usuario = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("is", $newCaramelos, $usuario);
            if ($stmt->execute()) {
                echo "Caramelos actualizados correctamente: " . $newCaramelos . "<br>";
            } else {
                echo "Error al actualizar caramelos: " . $stmt->error;
            }
        } else {
            // El usuario no tiene un registro, insertar uno nuevo
            $sql = "INSERT INTO manchita (usuario, caramelos) VALUES (?, ?)";
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
    <title>Manchita</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Vista/stylesManchita.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <form action=../Vista/manchita.php>
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