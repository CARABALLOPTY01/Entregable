<?php
include 'db_connection.php';

// Obtener el ID del beneficiario desde la URL
$id = intval($_GET['id']);

// Consultar los datos del beneficiario
$sql = "SELECT * FROM Beneficiario WHERE ID_Beneficiario = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos del beneficiario
    $beneficiario = $result->fetch_assoc();
} else {
    echo "Beneficiario no encontrado.";
    $conn->close();
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Beneficiario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #343a40;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Actualizar Beneficiario</h2>
        <form action="actualizar_beneficiario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $beneficiario['ID_Beneficiario']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $beneficiario['Nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $beneficiario['Apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $beneficiario['Correo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $beneficiario['Telefono']; ?>" required>
            </div>
            <div class="form-group">
                <label for="programa">Programa</label>
                <input type="text" class="form-control" id="programa" name="programa" value="<?php echo $beneficiario['Programa']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $beneficiario['Descripcion']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
        </form>
        <a href="admin_beneficiarios.php" class="btn btn-secondary btn-block mt-3">Volver</a>
    </div>
</body>
</html>
