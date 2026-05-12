<?php
$conexion = new mysqli("localhost", "root", "alvaro", "servicios_app");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
