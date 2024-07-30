<?php
//Esto sirve para bloquear lo de las flechitas de google
session_start();
// Evitar caché del navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
// Verificar si la sesión está activa
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}