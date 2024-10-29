<?php
session_start();
require_once '../Modelo/usuario.php';
require_once '../Modelo/conex_bd.php';

$conexion = new Conexion();
$UsuarioControlador = new Usuario($conexion->conectar());
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['registrarse'])) {
        $UsuarioControlador->registrar();
    } elseif (isset($_POST['login'])) {
        $UsuarioControlador->login();
    } elseif (isset($_POST['logout'])) {
        $UsuarioControlador->logout();
    }
}