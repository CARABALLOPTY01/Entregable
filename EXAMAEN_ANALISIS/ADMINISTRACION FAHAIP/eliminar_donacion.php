<?php
include 'db_connection.php';
session_start();

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM donacion WHERE ID_Donacion = $delete_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "<div class='alert alert-success'>Donación eliminada con éxito.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar la donación: " . $conn->error . "</div>";
    }
    header("Location: admin_gestion.php");
    exit();
}
?>
