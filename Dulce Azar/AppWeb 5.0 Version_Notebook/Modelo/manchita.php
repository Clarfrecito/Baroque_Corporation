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
            echo '<div class="carta" id="carta-' . $i . '">'; // Iniciar el div de la carta con un ID único
            echo '<img src="../images/' . $imagen . '" alt="' . $sale . '">'; // Mostrar la imagen de la carta

            if ($sale == "1 de Oros") {
                $manchita = "<h5>La manchita salió en la posición $posicion<h5>";
                $ganancia = in_array($i + 1, $apuesta) ? 3000 : -1000;
                $this->ganancias($ganancia);
                echo '</div>'; // Cerrar el div de la carta antes de salir
                echo '</div>'; // Cerrar el contenedor de la grilla
                return $manchita; // Salir de la función después de encontrar la carta
            }
            echo '</div>'; // Cerrar el div de la carta
        }
        echo '</div>'; // Cerrar el contenedor de la grilla

        // Añadir el script para mostrar las cartas con un retraso

    }
    public function ganancias($ganancia)
    {
        $usuario = $_SESSION['username'];
        $caramelos = $ganancia;
        $_SESSION['ganarOperder'] = null;
        if ($ganancia == 3000) {
            echo "<br><h4 style='color: green;'>¡Ganaste! $ganancia</h4><br>";
        } elseif ($ganancia == -1000) {
            echo "<br><h4 style='color: red;'>¡Perdiste! $ganancia</h4><br>";
        }

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
            //$_SESSION['caramelosM'] = $row['caramelos'];
            if ($caramelosActuales <= 0) {
                $newCaramelos = ($caramelos == -1000) ? 0 : 3000;
            } else {
                $newCaramelos = $caramelosActuales + $caramelos;
            }
            $sql = "UPDATE manchita SET caramelos = ? WHERE usuario = ?";
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
            $sql = "INSERT INTO manchita (usuario, caramelos) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("si", $usuario, $caramelos);

            if ($stmt->execute()) {
                echo '<h3 id="cant">' . $caramelos . '</h3>';
                echo '<img src="../images/caramelo.png" alt="Caramelo" id="carame">';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>

<body>
    <form action=../Vista/manchita.php>
        <div class="botonJugar">
            <button>Volver a Atras</button>
        </div>
        <div class="logo-container">
        <a href="../Vista/menu_principal.php">
        <img src="../../DulceAzar.png" alt="Logo" id="Logo">
        </a>
        </div>
    </form>
</body>
<style>
    :root {
        --primary-color: rgb(0, 0, 0);
        --secondary-color: rgb(61, 12, 8);
        --hover-color: rgb(255, 255, 255);
    }

    body {
        font-family: "Questrial", sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        background-image: url('../../FondoM.PNG');
        background-size: 100%;
        background-repeat: repeat;
        background-position: center;
    }

    button {
        font-family: 'Questrial', sans-serif;
        font-size: 16px;
        letter-spacing: 0.075em;
        box-sizing: border-box;
        border: 0;
        border-radius: 5px;
        color: white;
        padding: 1rem;
        background: rgb(185, 19, 9);
        transition: 0.2s background;
        margin-top: 5%;
        width: 100%;
        max-width: 200px;
        min-width: 100px;
        height: auto;
        font-size: 1rem;
        cursor: pointer;
        text-align: center;
        font-weight: bold;
}

    button:hover {
        background-color: var(--secondary-color);
        color: var(--hover-color);
    }

    h1 {
        position: absolute;
        top: 1.25%;
        left: 7%;
        font-size: 1.5em;
        color: rgb(185, 19, 9);
        font-weight: bold;
    }

    h2 {
        margin-top: 8%;
        text-align: center;
        color: white;
        font-size: 1.5rem;
    }

    h4 {
        text-align: center;
        position: absolute;
        top: 8%;
        left: 50%;
        transform: translateX(-50%);
        font-size: 2.5rem;
        color:rgb(185, 19, 9);
    }

    h5 {
        text-align: center;
        position: absolute;
        top: 27%;
        left: 50%;
        transform: translateX(-50%);
        font-size: 1.5rem;
        color: gold;
    }

    .cartas {
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        gap: 5px;
        width: 100%;
        margin-top: 2%;
    }

    .carta {
        width: 100px;
        height: 200px;
        padding: 5px;
    }

    .carta img {
        width: 100px;
        height: 150px;
    }

    .logo-container {
        position: absolute;
        top: 0%;
        left: 0;
    }

    #Logo {
        height: 3em;
        margin-top: 20%;
        margin-left: 20%;
    }

    #carame {
    width: 3%;  /* Ajusta el ancho del caramelo */
    height: 6%; /* Ajusta la altura del caramelo */
    position: absolute;
    top: 3%;
    left: 89.5%;
    }

    #cant {
        color: orange;
        font-weight: bold;
        position: absolute;
        top: 1.5%;
        left: 94%;
    }
    
</STYLE>

</html>