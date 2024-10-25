<?php
//Terminar L/V
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
        echo '<div class="contenedor_sale">';
        for ($i = 0; $i < 2; $i++) {
            if (count($cartas) == 0) {
                break;
            }
            $numero = array_rand($cartas);
            $sale = $numero;
            $valor = $cartas[$numero];
            unset($cartas[$numero]);
            $cartas_sacadas[] = array("carta" => $sale, "valor" => $valor);
            echo '<style>

        </style>';

            echo '<div class="contenedor">';
            echo '<div class="sale">';
            echo " <h3 id='car'>{$posiciones[$i]}: $sale</h3>";
            echo '</div>';
            echo '<div class="cartas">';
            $imagen = strtolower(str_replace(' ', '_', $sale)) . '.png'; // Construir el nombre de archivo de la imagen
            echo '<div class="carta">'; // Iniciar el div de la carta
            echo '<img src="../images/' . $imagen . '" alt="' . $sale . '">'; // Mostrar la imagen de la carta
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo "</div>";
        // Verificar si las dos cartas tienen el mismo valor
        if ($cartas_sacadas[0]['valor'] === $cartas_sacadas[1]['valor']) {
            $carta_ganadora = null;
            $empate = "Empate";
        } else {
            // Determinar la carta ganadora
            $carta_ganadora = null;
            $valor_maximo = -1;
            $posicion_ganadora = null;
            foreach ($cartas_sacadas as $index => $carta) {
                if ($carta['valor'] > $valor_maximo) { // Mostrar la imagen de la carta
                    $valor_maximo = $carta['valor'];
                    $carta_ganadora = $carta['carta'];
                    $posicion_ganadora = $posiciones[$index];
                }
            }
        }

        if ($carta_ganadora !== null) {
            echo "<h2>El ganador es el $posicion_ganadora con la carta $carta_ganadora</h2>";
            if ($posicion_ganadora == "Local") {
                $ganancia = ($apuesta == $posicion_ganadora) ? 3000 : -1000;
                $_SESSION['empate'] = null;
                $this->ganancias($ganancia);
            } else if ($posicion_ganadora == "Visitante") {
                $ganancia = ($apuesta == $posicion_ganadora) ? 3000 : -1000;
                $_SESSION['empate'] = null;
                $this->ganancias($ganancia);
            }
        } else {
            echo "<h2>¡Es un Empate!</h2>";
            $ganancia = ($apuesta == $empate) ? 15000 : -1000;
            $_SESSION['empate'] = $empate;
            $this->ganancias($ganancia);
        }
    }

    public function ganancias($ganancia)
    {
        $usuario = $_SESSION['username'];
        // Determinar la cantidad de caramelos a sumar o restar
        $caramelos = $ganancia;
        if ($ganancia == 3000 || $ganancia == 15000) {
            echo "<h4 style='color: green;'>¡Ganaste! $ganancia</h4>";
        } elseif ($ganancia == -1000) {
            echo "<h4 style='color: red;'>¡Perdiste! $ganancia</h4>";
        }

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
            //$_SESSION['caramelosL'] = $row['caramelos'];
            if ($caramelosActuales <= 0) {
                if (isset($_SESSION['empate'])) {
                    $newCaramelos = ($caramelos == -1000) ? 0 : 15000;
                } else {
                    $newCaramelos = ($caramelos == -1000) ? 0 : 3000;
                }
            } else {
                $newCaramelos = $caramelosActuales + $caramelos;
            }
            $sql = "UPDATE local_visitante SET caramelos = ? WHERE usuario = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("is", $newCaramelos, $usuario);
            if ($stmt->execute()) {
                echo '<h3 id="cant">' . $newCaramelos . '</h3>';
                echo '<img src="../images/caramelo.png" alt="Caramelo" id="carame">';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>

    <form action=../Vista/local_visitante.php>
        <div class="botonJugar">
            <button>Volver a Jugar</button>
        </div>
    </form>

</body>
<style>
    :root {
        --primary-color: rgb(0, 0, 0);
        --secondary-color: #00BAFF;
        --hover-color: rgb(255, 255, 255);
    }

    body {
        font-family: "Questrial", sans-serif;
        background-color: #1E1E1E;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    button {
        box-sizing: border-box;
        border: 0;
        border-radius: 20%;
        color: var(--secondary-color);
        padding: 1rem;
        background: var(--primary-color);
        transition: 0.2s background;
        margin-top: 5%;
        height: auto;
        width: 75%;
        font-size: 1rem;
        cursor: pointer;
        text-align: center;
        font-weight: bold;
    }

    button:hover {
        background-color: var(--secondary-color);
        color: var(--hover-color);
    }

    .sale {
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .cartas {
        width: 150px;
        height: 200px;
        align-items: center;
        justify-content: center;
    }

    .carta {
        width: 150px;
        height: 200px;
    }

    .carta img {
        width: 135px;
        height: 200px;
        margin-left: 5%;
    }

    .contenedor {
        display: grid;
        grid-template-rows: 1fr;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .contenedor_sale {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    #car {
        text-align: center;
        color: cyan;
    }

    #cant {
        color: orange;
        font-weight: bold;
        position: absolute;
        top: 2%;
        left: 94%;
    }

    #carame {
    width: 2%;  /* Ajusta el ancho del caramelo */
    height: 5%; /* Ajusta la altura del caramelo */
    position: absolute;
    top: 2%;
    left: 89.5%;
    }

    .logo-container {
        position: absolute;
        top: 2%;
        left: 0;
    }

    #Logo {
        height: 3em;
    }

    h1 {
        position: absolute;
        top: 1.25%;
        left: 7%;
        font-size: 1.5em;
        color: crimson;
        font-weight: bold;
    }

    h2 {
        text-align: center;
        color: gold;
        margin-top: 3%;
    }

    h4 {
        text-align: center;
        position: absolute;
        top: 8%;
        left: 90.5%;
    }
</style>

</html>