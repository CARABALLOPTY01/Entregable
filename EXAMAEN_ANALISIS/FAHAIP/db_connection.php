<?php
$servername = "localhost";
$username = "root"; // Reemplaza esto con tu nombre de usuario real
$password = ""; // Deja esto vacío si no usas contraseña
$dbname = "fahaip"; // Reemplaza esto con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
