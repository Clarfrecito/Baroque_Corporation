<?php
session_start();
require_once 'conex_bd.php';
class Usuario
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    public function registrar()
    {
        if (isset($_POST['registrarse'])) {
            if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
                $filtroUsername = "[A-Za-z0-9_]{5,20}";
                $filtroEmail = "[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}";
                if ($this->verificar_datos($filtroUsername, $_POST['username']) && $this->verificar_datos($filtroEmail, $_POST['email'])) {
                    $username = $this->limpiar_cadena($_POST['username']);
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $email = $this->limpiar_cadena($_POST['email']);
                    $caramelos = 1000;

                    $stmt = $this->conexion->prepare("INSERT INTO usuarios (username, email, password,caramelos) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("sssi", $username, $email, $password, $caramelos);
                    if ($stmt->execute()) {
                        $_SESSION['username'] = $username;
                        header("Location: ../Vista/login.php");
                        exit();
                    } else {
                        echo '<script>
                                alert("Ha ocurrido un error al registrar.");
                                window.location.href = "http://localhost/AppWeb%205.0/Vista/registrarse.php";
                             </script>';
                    }
                    $stmt->close();
                } else {
                    echo '<script>
                            alert("Los datos ingresados no son correctos");
                            window.location.href = "http://localhost/AppWeb%205.0/Vista/registrarse.php";
                         </script>';
                }
            } else {
                echo '<script>
                        alert("Por favor complete todos los datos.");
                        window.location.href = "http://localhost/AppWeb%205.0/Vista/registrarse.php";
                     </script>';
            }
        } else {
            header("Location: ../Vista/registrarse.php");
            exit();
        }
    }
    public function logout()
    {
        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Location: ../index.php");
            exit();
        }
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usernameOrEmail = $this->limpiar_cadena($_POST["usernameOrEmail"]);
            $password = $_POST["password"];

            $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE username = ? OR email = ?");
            $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result && $result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id_usuario'] = $row['id'];
                    header("Location: ../Vista/menu_principal.php");
                    exit();
                } else {
                    echo '<script>
                    alert("Contraseña incorrecta.");
                    window.location.href = "http://localhost/AppWeb%205.0/Vista/login.php";
                 </script>';
                }
            } else {
                echo '<script>
                alert("Usuario no encontrado.");
                window.location.href = "http://localhost/AppWeb%205.0/Vista/login.php";
             </script>';
            }
            $stmt->close();
        }
    }

    public function verificar_datos($filtro, $cadena)
    {
        if (preg_match("/^" . $filtro . "$/", $cadena)) {
            return true;
        } else {
            return false;
        }
    }
    public function limpiar_cadena($cadena)
    {
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_ireplace("<script>", "", $cadena);
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script src", "", $cadena);
        $cadena = str_ireplace("<script type=", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE FROM", "", $cadena);
        $cadena = str_ireplace("INSERT INTO", "", $cadena);
        $cadena = str_ireplace("DROP TABLE", "", $cadena);
        $cadena = str_ireplace("DROP DATABASE", "", $cadena);
        $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
        $cadena = str_ireplace("SHOW TABLES;", "", $cadena);
        $cadena = str_ireplace("SHOW DATABASES;", "", $cadena);
        $cadena = str_ireplace("<?php", "", $cadena);
        $cadena = str_ireplace("?>", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace("^", "", $cadena);
        $cadena = str_ireplace("<", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        $cadena = str_ireplace("::", "", $cadena);
        return $cadena;
    }
}
