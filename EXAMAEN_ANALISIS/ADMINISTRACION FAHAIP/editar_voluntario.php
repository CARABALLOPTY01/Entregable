<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $comision = $_POST['comision'];
    $disponibilidad = $_POST['disponibilidad'];
    $mensaje = $_POST['mensaje'];

    $sql_update = "UPDATE Voluntario SET Nombre='$nombre', Apellido='$apellido', Email='$email', Telefono='$telefono', Comision='$comision', Disponibilidad='$disponibilidad', Mensaje='$mensaje' WHERE ID_Voluntario=$id";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "<div style='text-align: center; padding: 50px; background-color: #f9f9f9;'>
                <h1>¡Voluntario actualizado con éxito!</h1>
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
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Voluntario WHERE ID_Voluntario=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        header('Location: admin_voluntarios.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Voluntario - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrap.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            border-radius: 5px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Editar Voluntario</h2>
        
        <form method="POST" action="editar_voluntario.php">
            <input type="hidden" name="id" value="<?php echo $row['ID_Voluntario']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['Apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="email" value="<?php echo $row['Email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['Telefono']; ?>" required>
            </div>
            <div class="form-group">
                <label for="comision">Comisión</label>
                <input type="text" class="form-control" id="comision" name="comision" value="<?php echo $row['Comision']; ?>" required>
            </div>
            <div class="form-group">
                <label for="disponibilidad">Disponibilidad</label>
                <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" value="<?php echo $row['Disponibilidad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje (Opcional)</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="3"><?php echo $row['Mensaje']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Actualizar Voluntario</button>
            <button type="button" class="btn btn-secondary btn-block" onclick="location.href='admin_voluntarios.php';">Cancelar</button>
        </form>
    </div>
</body>
</html>
