<?php

class Manchita
{
    public function encontrarManchita()
    {
       header("Location: ../Vista/manchita.php");
    }

    public function procesarApuesta($apuesta)
    {
        $cartas = array(
            "1 de Oros", "2 de Oros", "3 de Oros", "4 de Oros", "5 de Oros", "6 de Oros", "7 de Oros", "8 de Oros", "9 de Oros", "10 de Oros", "11 de Oros", "12 de Oros",
            "1 de Copas", "2 de Copas", "3 de Copas", "4 de Copas", "5 de Copas", "6 de Copas", "7 de Copas", "8 de Copas", "9 de Copas", "10 de Copas", "11 de Copas", "12 de Copas",
            "1 de Espadas", "2 de Espadas", "3 de Espadas", "4 de Espadas", "5 de Espadas", "6 de Espadas", "7 de Espadas", "8 de Espadas", "9 de Espadas", "10 de Espadas", "11 de Espadas", "12 de Espadas",
            "1 de Bastos", "2 de Bastos", "3 de Bastos", "4 de Bastos", "5 de Bastos", "6 de Bastos", "7 de Bastos", "8 de Bastos", "9 de Bastos", "10 de Bastos", "11 de Bastos", "12 de Bastos",
            "Comodin 1", "Comodin 2"
        );

        for ($i = 0; $i < 50; $i++) {
            $numero = rand(0, 49);
            $sale = $cartas[$numero];
            $posicion = $i + 1;

            if ($sale == "1 de Oros") { 
                echo "La manchita salio en la posicion " . $posicion . "<br>";
                $gano = ($posicion == $apuesta) ? "Ganaste" : "Perdiste";
                echo $gano;
                return; 
            } else {
                echo $sale . "<br>";
            }
        }
    }
}

//if (isset($_POST["apostar"])) {
    $apuesta = isset($_POST["posicion"]) ? $_POST["posicion"] : null;
    if ($apuesta !== null) {
        echo "Apostaste por la posición " . htmlspecialchars($apuesta) . "<br>"; // Protección contra XSS
        procesarApuesta($apuesta);
    } else {
        echo "No se ha definido una apuesta.<br>";
    }
//}
$jugar= new Manchita();
if(isset($_POST["manchita"])){
    $jugar->encontrarManchita();
}
