<?php
session_start();  // Iniciar la sesión
session_destroy();  // Destruir todas las sesiones actuales
header('Location: login.php');  // Redirigir al usuario a la página de inicio de sesión
?>
