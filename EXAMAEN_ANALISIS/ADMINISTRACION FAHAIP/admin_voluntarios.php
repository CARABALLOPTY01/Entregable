<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
include 'db_connection.php';

// Obtener la lista de voluntarios
$sql = "SELECT * FROM Voluntario";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Voluntarios - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
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
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.875rem;
        }
        .text-center {
            text-align: center;
        }
        .btn-excel {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        .btn-excel:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Gestión de Voluntarios</h2>
        
        <!-- Botón para exportar a Excel
        <div class="text-right mb-3">
            <form method="post" action="export_excel.php">
                <button type="submit" class="btn btn-excel">Exportar a Excel</button>
            </form>
        </div> -->

        <!-- Tabla de voluntarios registrados -->
        <table class="table table-bordered mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Comisión</th>
                    <th>Disponibilidad</th>
                    <th>Mensaje</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["ID_Voluntario"] . "</td>
                                <td>" . (isset($row["Nombre"]) ? $row["Nombre"] : "") . "</td>
                                <td>" . (isset($row["Apellido"]) ? $row["Apellido"] : "") . "</td>
                                <td>" . (isset($row["Correo"]) ? $row["Correo"] : "") . "</td>
                                <td>" . (isset($row["Telefono"]) ? $row["Telefono"] : "") . "</td>
                                <td>" . (isset($row["Comision"]) ? $row["Comision"] : "") . "</td>
                                <td>" . (isset($row["Disponibilidad"]) ? $row["Disponibilidad"] : "") . "</td>
                                <td>" . (isset($row["Mensaje"]) ? $row["Mensaje"] : "") . "</td>
                                <td>" . (isset($row["Fecha_Registro"]) ? $row["Fecha_Registro"] : "") . "</td>
                                <td>
                                    <a href='editar_voluntario.php?id=" . $row["ID_Voluntario"] . "' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='eliminar_voluntario.php?id=" . $row["ID_Voluntario"] . "' class='btn btn-danger btn-sm'>Eliminar</a>
                                    <a href='aprobar_voluntario.php?id=" . $row["ID_Voluntario"] . "' class='btn btn-success btn-sm'>Aprobar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>No hay voluntarios registrados</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
