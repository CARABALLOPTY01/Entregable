<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Beneficiarios - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .btn {
            margin-right: 5px;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h2 class="text-center">Gestión de Beneficiarios</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Programa</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';

                // Consulta SQL para seleccionar los beneficiarios
                $sql = "SELECT ID_Beneficiario, Nombre, Apellido, Correo, Telefono, Programa, Descripcion FROM Beneficiario";

                // Ejecutar la consulta y manejar errores
                $result = $conn->query($sql);
                if (!$result) {
                    echo "<tr><td colspan='8' class='text-center'>Error en la consulta: " . $conn->error . "</td></tr>";
                } else {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ID_Beneficiario']}</td>
                                    <td>{$row['Nombre']}</td>
                                    <td>{$row['Apellido']}</td>
                                    <td>{$row['Correo']}</td>
                                    <td>{$row['Telefono']}</td>
                                    <td>{$row['Programa']}</td>
                                    <td>{$row['Descripcion']}</td>
                                    <td>
                                        <a href='editar_beneficiario.php?id={$row['ID_Beneficiario']}' class='btn btn-warning btn-sm'>Actualizar</a>
                                        <a href='eliminar_beneficiario.php?id={$row['ID_Beneficiario']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No hay beneficiarios registrados</td></tr>";
                    }
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="admin_gestion.php" class="btn btn-primary btn-block mt-4">Volver a Administración y Gestión</a>
    </div>
</body>
</html>
