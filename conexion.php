<?php
// Usamos el nuevo usuario 'admin' y la contraseña 'admin123'
$conexion = new mysqli("127.0.0.1", "admin", "admin123", "world");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>