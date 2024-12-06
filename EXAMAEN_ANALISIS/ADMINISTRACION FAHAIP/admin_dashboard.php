<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundación FAHAIP PANAMÁ - Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="estilos_admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar img {
            width: 150px;
            margin: 0 auto;
            display: block;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card h5 {
            font-size: 1.25rem;
        }
        .card p {
            font-size: 1rem;
        }
        .chart-container {
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <img src="img/logo fahaip.png" alt="Logo Fundación FAHAIP">
    <div class="text-center mt-3">
        <img src="img/admin.png" alt="Admin" class="rounded-circle" style="width: 100px;">
        <p>Admin correo electrónico</p>
        <h1 class="text-center">Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
    </div>
    <a href="admin_dashboard.php"><i class="fas fa-home"></i> Inicio</a>
    <a href="admin_gestion.php"><i class="fas fa-tasks"></i> Administración y Gestión</a>
    <a href="admin_donaciones.php"><i class="fas fa-file-alt"></i> Generar Reporte de Actividad</a>
    <a href="admin_noticias.php"><i class="fas fa-clipboard-list"></i> Proceso de Gestión de Proveedores</a>
    <a href="admin_configuraciones.php"><i class="fas fa-project-diagram"></i> Gestión de Recursos y Proyectos</a>
    <a href="admin_voluntarios.php"><i class="fas fa-user-cog"></i> Seguimiento de Voluntarios</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
</div>

<div class="content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin FAHAIP</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1 class="text-center">Administración y Gestión</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuarios Registrados</h5>
                    <p class="card-text">Total: <span id="total-usuarios">0</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Donaciones Recibidas</h5>
                    <p class="card-text">Total: <span id="total-donaciones">0</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Eventos Próximos</h5>
                    <p class="card-text">Total: <span id="total-eventos">0</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row chart-container">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gráfico de Donaciones</h5>
                    <canvas id="grafico-donaciones"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gráfico de Usuarios</h5>
                    <canvas id="grafico-usuarios"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctxDonaciones = document.getElementById('grafico-donaciones').getContext('2d');
    var chartDonaciones = new Chart(ctxDonaciones, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            datasets: [{
                label: 'Donaciones en 2024 ($)',
                data: [1200, 1900, 3000, 5000, 2000, 3000],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctxUsuarios = document.getElementById('grafico-usuarios').getContext('2d');
    var chartUsuarios = new Chart(ctxUsuarios, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            datasets: [{
                label: 'Registros en 2024',
                data: [1200, 1900, 3000, 5000, 2000, 3000],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrap.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
