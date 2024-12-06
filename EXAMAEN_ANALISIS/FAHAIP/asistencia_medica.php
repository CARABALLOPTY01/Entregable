<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegurarse de que el ID sea un entero
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? $conn->real_escape_string($_POST['apellido']) : '';
    $correo = isset($_POST['correo']) ? $conn->real_escape_string($_POST['correo']) : '';
    $telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : '';
    $necesidad = isset($_POST['necesidad']) ? $conn->real_escape_string($_POST['necesidad']) : '';
    $descripcion = isset($_POST['descripcion']) ? $conn->real_escape_string($_POST['descripcion']) : '';

    // Insertar los datos en la tabla AsistenciaMedica
    $sql = "INSERT INTO AsistenciaMedica (Nombre, Apellido, Correo, Telefono, Necesidad, Descripcion)
            VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$necesidad', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='text-align: center; padding: 50px; background-color: #f9f9f9;'>
                <h1>¡Gracias por tu solicitud de asistencia!</h1>
                <p>Tu solicitud ha sido enviada exitosamente.</p>
                <p>Serás redirigido a la página principal en unos segundos.</p>
                <style>
                    body { background-image: url('img/gracias.jpg'); background-size: cover; }
                    h1 { color: #4CAF50; }
                </style>
              </div>";
        echo "<script>
                setTimeout(function(){
                    window.location.href = 'index.php';
                }, 5000);
              </script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Médica - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Formulario de Asistencia Médica</h2>
        <form method="POST" action="solicitud_asistencia.php">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="necesidad">Necesidad Médica</label>
                <select class="form-control" id="necesidad" name="necesidad" required>
                    <option value="Consulta">Consulta</option>
                    <option value="Tratamiento">Tratamiento</option>
                    <option value="Medicamentos">Medicamentos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar Solicitud</button>
            <button type="button" class="btn btn-secondary btn-block" onclick="location.reload();">Actualizar</button>
        </form>
    </div>
</body>
</html>
