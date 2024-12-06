<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM Beneficiario WHERE ID_Beneficiario='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Beneficiario eliminado correctamente.";
    } else {
        echo "Error al eliminar el beneficiario: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID de beneficiario no proporcionado.";
}

// Redirigir después de la eliminación
header('Location: admin_beneficiarios.php');
exit();
?>
