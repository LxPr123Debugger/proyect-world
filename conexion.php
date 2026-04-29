<?php
// Conexión a MariaDB
$conexion = new mysqli("127.0.0.1", "root", "", "world");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
// Esto es para que las tildes se vean bien
$conexion->set_charset("utf8mb4");
?>