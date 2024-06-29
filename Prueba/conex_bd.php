<?php

$conexion = mysqli_connect("localhost", "root", "", "dulce_azar");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
} else {
    echo "Se conecto";
}

session_start();
