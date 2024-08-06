<?php
require_once("../Controlador/manchita.php");
require_once("juegos.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Culo Sucio</title>
</head>
<body>
    <?php
        if (isset($_POST["manchita"])) {
            header("Location: ../Controlador/manchita.php");
        }        
    ?>
    <div>
        <form method="POST">
            <input type="checkbox" name="posicion" value="1" required>
            <input type="checkbox" name="posicion" value="2" required>
            <input type="checkbox" name="posicion" value="3" required>
            <input type="checkbox" name="posicion" value="4" required>
            <input type="submit" name="apostar" value="Apostar">
        </form>
        <?php
        if(isset($_POST["apostar"])){
            header("Location: ../Controlador/manchita.php");
        }
        ?>
    </div>
</body>
</html>
