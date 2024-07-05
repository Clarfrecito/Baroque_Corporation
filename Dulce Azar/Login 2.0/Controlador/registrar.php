<?php


require_once '../Modelo/usuario.php';
require_once '../Modelo/conex_bd.php';

class RegistrarControlador
{
    private $usuario;
    private $conexion;

    public function __construct($usuario, $conexion)
    {
        session_start();
        $this->usuario = $usuario;
        $this->conexion = $conexion::conectar();
    }

    public function registrar()
    {
        if (isset($_POST['registrarse'])) {
            if (strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['email']) >= 1) {
                $username = $_POST['username'];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $_SESSION['username'] = $username; // Correcta asignación de sesión
                $_SESSION['password'] = $password;

                if ($this->usuario->registrar($username, $email, $password)) {
                    $mensaje = "¡Te registraste correctamente!";
                    $registrado = true;
                    header("Location:../Vista/login.php");
                    exit();
                } else {
                    $mensaje = "Ha ocurrido un error";
                }
            } else {
                $mensaje = "Por favor complete todos los datos";
            }

            include '../Vista/registrarse.php';
        } else {
            header("Location: ../Vista/registrarse.php");
            exit();
        }
    }

    public function logout()
    {
        // Eliminar todas las variables de sesión
        $_SESSION = array();

        // Elimino la cookie para que no se pueda volver
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finalmente destruir la sesión
        session_destroy();
        header("Location: ../Vista/registrarse.php");
        exit();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
    
            // Establish database connection
            $conn = $this->conexion;
    
            // Preparar declaración SQL con parámetros
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username=?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    header("Location: ../Vista/juegos.php");
                    exit();
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "Usuario no encontrado";
            }
    
            // Cerrar la declaración
            $stmt->close();
        }
    }
    }
    
$usuario = new Usuario();
$conexion = new Conexion();

if (isset($_POST['registrarse'])) {
    $controlador = new RegistrarControlador($usuario, $conexion);
    $controlador->registrar();
} elseif (isset($_POST['Iniciar Sesion'])) {
    $controlador = new RegistrarControlador($usuario, $conexion);
    $controlador->login();
} elseif (isset($_POST['logout'])) {
    $controlador = new RegistrarControlador($usuario, $conexion);
    $controlador->logout();
}
