<?php
// Intentamos conectar sin contraseña (común en entornos de desarrollo)
$conexion = new mysqli("localhost", "root", "", "world");

// Si falla, intentamos con el usuario por defecto de Codespaces
if ($conexion->connect_error) {
    $conexion = new mysqli("127.0.0.1", "root", "root", "world");
}

if ($conexion->connect_error) {
    die("Error final de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>