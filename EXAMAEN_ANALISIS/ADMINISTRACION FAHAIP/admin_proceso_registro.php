
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Donaciones - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrap.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .btn {
            margin-right: 5px;
        }
        .table-container {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
            padding: 12px;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
            font-weight: bold;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody tr {
            transition: background-color 0.2s;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table tbody td {
            border-bottom: 1px solid #dee2e6;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004080;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h2 class="text-center">Gestión de Donaciones</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Monto</th>
                    <th>Método de Pago</th>
                    <th>Mensaje</th>
                    <th>Frecuencia</th>
                    <th>Tipo de Donación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';

                // Consulta SQL para seleccionar las donaciones
                $sql = "SELECT ID_Donacion, Nombre, Monto, Metodo_Pago, Mensaje, Frecuencia, Tipo_Donacion, Estado FROM donacion";

                // Ejecutar la consulta y manejar errores
                $result = $conn->query($sql);
                if (!$result) {
                    echo "<tr><td colspan='9' class='text-center'>Error en la consulta: " . $conn->error . "</td></tr>";
                } else {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['ID_Donacion']}</td>
                                    <td>{$row['Nombre']}</td>
                                    <td>{$row['Monto']}</td>
                                    <td>{$row['Metodo_Pago']}</td>
                                    <td>{$row['Mensaje']}</td>
                                    <td>{$row['Frecuencia']}</td>
                                    <td>{$row['Tipo_Donacion']}</td>
                                    <td>{$row['Estado']}</td>
                                    <td>
                                        <a href='eliminar_donacion.php?delete_id={$row['ID_Donacion']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que quieres eliminar esta donación?\");'>Eliminar</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No hay donaciones registradas</td></tr>";
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
