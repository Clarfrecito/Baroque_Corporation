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

    public function encontrarManchita()
    {
        $caramelos = 1000;
        $usuario = $_SESSION['username'];

        // Primero, verificar si el usuario ya existe en la tabla manchita
        $sql = "SELECT id FROM manchita WHERE usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El usuario ya existe, así que actualiza la fila con los nuevos caramelos
            $sql = "UPDATE manchita SET caramelos = ? WHERE usuario = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("is", $caramelos, $usuario);

            if ($stmt->execute()) {
                // Redirigir al usuario después de la actualización
                header("Location: ../Vista/manchita.php?jugar=1");
                exit();
            } else {
                echo "Error al actualizar los caramelos: " . $stmt->error;
            }
        } else {
            // El usuario no existe, así que inserta un nuevo registro
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

        for ($i = 0; $i < 50; $i++) {
            $numero = rand(0, 49);
            $sale = $cartas[$numero];
            $posicion = $i + 1;

            if ($sale == "1 de Oros") {
                echo "La manchita salió en la posición " . $posicion . "<br>";
                $ganancia = ($posicion == $apuesta) ? 2000 : -1000;
                if ($ganancia == 1000) {
                    echo "Ganaste<br>";
                    $this->ganancias($ganancia);
                } else {
                    echo "Perdiste<br>";
                    $this->ganancias($ganancia);
                }
                echo $ganancia;
                return;
            } else {
                echo "Posición " . $posicion . ": " . $sale . "<br>";
            }
        }
    }

    public function ganancias($ganancia)
    {
        $username = $_SESSION["username"];

        // Determinar la cantidad de caramelos a sumar o restar
        $caramelos = $ganancia;

        // Imprimir valores para depuración
        echo "Ganancia: " . $ganancia . "<br>";
        echo "Caramelos a sumar/restar: " . $caramelos . "<br>";

        // Primero, verificar si el usuario ya tiene un registro en la tabla manchita
        $sql = "SELECT caramelos FROM manchita WHERE usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El usuario ya tiene un registro, actualizar la cantidad de caramelos
            $row = $result->fetch_assoc();
            $currentCaramelos = $row['caramelos'];
            $newCaramelos = $currentCaramelos + $caramelos;

            // Imprimir valores para depuración
            echo "Caramelos actuales: " . $currentCaramelos . "<br>";
            echo "Caramelos nuevos: " . $newCaramelos . "<br>";

            $sql = "UPDATE manchita SET caramelos = ? WHERE usuario = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("is", $newCaramelos, $username);

            if ($stmt->execute()) {
                echo "Caramelos actualizados correctamente: " . $newCaramelos . "<br>";
            } else {
                echo "Error al actualizar caramelos: " . $stmt->error;
            }
        } else {
            // El usuario no tiene un registro, insertar uno nuevo
            $sql = "INSERT INTO manchita (usuario, caramelos) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("si", $username, $caramelos);

            if ($stmt->execute()) {
                echo "Registro de caramelos creado correctamente.";
            } else {
                echo "Error al crear el registro: " . $stmt->error;
            }
        }

        $stmt->close();
    }



}

