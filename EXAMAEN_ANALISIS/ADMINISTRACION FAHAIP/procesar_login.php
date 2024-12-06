<?php
include 'db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para verificar el usuario por correo electrónico
    $sql = "SELECT * FROM Usuario WHERE Correo=?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error en la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificación de la contraseña
        if (password_verify($password, $row['Contraseña'])) {
            $_SESSION['usuario'] = $row['Nombre'];
            $_SESSION['ID_Rol'] = $row['ID_Rol']; // Añadir el rol del usuario a la sesión
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró una cuenta con ese correo electrónico.";
    }

    $stmt->close();
    $conn->close();
}
?>
