<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_delete = "DELETE FROM Voluntario WHERE ID_Voluntario=$id";
    
    if ($conn->query($sql_delete) === TRUE) {
        echo "<div style='text-align: center; padding: 50px; background-color: #f9f9f9;'>
                <h1>¡Voluntario eliminado con éxito!</h1>
                <p>Serás redirigido a la página de gestión en unos segundos.</p>
                <style>
                    body { background-image: url('img/gracias.jpg'); background-size: cover; }
                    h1 { color: #4CAF50; }
                </style>
              </div>";
        echo "<script>
                setTimeout(function(){
                    window.location.href = 'admin_voluntarios.php';
                }, 5000);
              </script>";
        exit();
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
} else {
    header('Location: admin_voluntarios.php');
    exit();
}

$conn->close();
?>
