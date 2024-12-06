<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $comision = $_POST['comision'];
    $disponibilidad = $_POST['disponibilidad'];
    $mensaje = $_POST['mensaje'];

    // Insertar en la tabla Voluntario
    $sql_voluntario = "INSERT INTO Voluntario (Nombre, Apellido, Email, Telefono, Comision, Disponibilidad, Mensaje, Fecha_Inscripcion, Horas_Trabajadas) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$comision', '$disponibilidad', '$mensaje', CURRENT_DATE, 0)";
    if ($conn->query($sql_voluntario) === TRUE) {
        echo '<div style="text-align: center; padding: 20px; background-color: #e9ecef; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';
        echo "<h2 style='color: #007bff;'>¡Gracias, $nombre!</h2>";
        echo "<p style='color: #343a40;'>Hemos recibido tu solicitud de voluntariado y nos pondremos en contacto contigo pronto.</p>";
        echo '<p><a href="index.php" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff;">Volver a la página principal</a></p>';
        echo '</div>';
    } else {
        echo '<div style="text-align: center; padding: 20px; background-color: #f8d7da; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';
        echo "<h2 style='color: #721c24;'>Error</h2>";
        echo "<p style='color: #721c24;'>Hubo un problema al enviar tu solicitud. Por favor, intenta nuevamente.</p>";
        echo "<p>Error: " . $sql_voluntario . "<br>" . $conn->error . "</p>";
        echo '</div>';
    }

    $conn->close();
} else {
    echo '<div style="text-align: center; padding: 20px; background-color: #f8d7da; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';
    echo "<h2 style='color: #721c24;'>Error en el envío del formulario</h2>";
    echo "<p style='color: #721c24;'>Por favor, intenta nuevamente.</p>";
    echo '</div>';
}
?>
