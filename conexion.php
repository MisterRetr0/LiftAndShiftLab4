<?php
// CAMBIO: el host ahora es db-mysql (el nombre del servicio en Docker)
// Parámetros para la red de contenedores: el host es el nombre del servicio en docker-compose
$host = "db-mysql";
$dbname = "db_proyecto_mvc";
$usuario = "root";
$contrasena = "clave_secreta_nube";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
