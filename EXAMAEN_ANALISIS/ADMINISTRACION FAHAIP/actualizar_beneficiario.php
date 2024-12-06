<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y escapar los datos recibidos
    $id = intval($_POST['id']); // Asegurarse de que el ID sea un entero
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $programa = $conn->real_escape_string($_POST['programa']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);

    // Preparar la consulta SQL para actualizar
    $sql = "UPDATE Beneficiario SET Nombre='$nombre', Apellido='$apellido', Correo='$correo', Telefono='$telefono', Programa='$programa', Descripcion='$descripcion' WHERE ID_Beneficiario='$id'";

    // Ejecutar la consulta y manejar errores
    if ($conn->query($sql) === TRUE) {
        echo "Beneficiario actualizado correctamente.";
    } else {
        echo "Error al actualizar el beneficiario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}

// Redirigir después de la actualización
header('Location: admin_beneficiarios.php');
exit();
?>
