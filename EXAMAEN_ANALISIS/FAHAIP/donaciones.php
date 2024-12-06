
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $monto = $_POST['monto'];
    $metodo_pago = $_POST['metodo_pago'];
    $mensaje = $_POST['mensaje'];
    $tipo_donacion = $_POST['tipo_donacion'];
    $estado = 'Pendiente';

    if ($tipo_donacion === 'Recurrente') {
        $frecuencia = $_POST['frecuencia'];
        $sql_insert_donacion = "INSERT INTO donacion (Nombre, Monto, Metodo_Pago, Mensaje, Tipo_Donacion, Estado, Frecuencia) 
                                VALUES ('$nombre', $monto, '$metodo_pago', '$mensaje', '$tipo_donacion', '$estado', '$frecuencia')";
    } else {
        $sql_insert_donacion = "INSERT INTO donacion (Nombre, Monto, Metodo_Pago, Mensaje, Tipo_Donacion, Estado) 
                                VALUES ('$nombre', $monto, '$metodo_pago', '$mensaje', '$tipo_donacion', '$estado')";
    }

    if ($conn->query($sql_insert_donacion) === TRUE) {
        echo "<div style='text-align: center; padding: 50px; background-color: #f9f9f9;'>
                <h1>¡Gracias por tu donación!</h1>
                <p>Tu apoyo es fundamental para nuestras iniciativas.</p>
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
        echo "Error: " . $sql_insert_donacion . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donaciones - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <style>
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-10px);
        }

        .card-img-top-custom {
            border-radius: 10px 10px 0 0;
            height: 200px;
            object-fit: cover;
        }

        .btn-custom {
            background-color: #08f;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0077cc;
        }
    </style>
</head>
<body>
    <header>
        <div class="fixed-header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><img src="img/logo fahaip.png" alt="Logo Fundación FAHAIP" style="width: 40px;"> Fundación FAHAIP</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="voluntariado.php">Voluntariado</a></li>
                        <li class="nav-item"><a class="nav-link" href="donaciones.php">Donación</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>DEJA TU HUELLA</h2>
                <p>Dona a FAHAIP</p>
                <p>Tu apoyo es fundamental para nuestras iniciativas! Gracias a las donaciones, podemos ofrecer programas educativos, servicios de salud y apoyo social a quienes más lo necesitan.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <img src="img/unica.png" class="card-img-top card-img-top-custom" alt="Donación Única">
                    <div class="card-body text-center">
                        <h5 class="card-title">Donación Única</h5>
                        <p>Juntos, podemos construir un futuro más equitativo y sostenible para todos.</p>
                        <button class="btn btn-custom" onclick="window.open('donacion_unica.php', '_blank')">Dona</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <img src="img/recurrente.png" class="card-img-top card-img-top-custom" alt="Donación Recurrente">
                    <div class="card-body text-center">
                        <h5 class="card-title">Donación Recurrente</h5>
                        <p>Puedes hacer una diferencia a largo plazo con una donación recurrente.</p>
                        <button class="btn btn-custom" onclick="window.open('donacion_recurrente.php', '_blank')">Dona</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <img src="img/alimentaria.png" class="card-img-top card-img-top-custom" alt="Donación Alimentaria">
                    <div class="card-body text-center">
                        <h5 class="card-title">Donación Alimentaria</h5>
                        <p>Con tus donaciones de alimentos, ayudamos a familias necesitadas a tener acceso a productos básicos y nutritivos.</p>
                        <button class="btn btn-custom" onclick="window.open('donacion_alimentaria.php', '_blank')">Dona</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <img src="img/ropa.png" class="card-img-top card-img-top-custom" alt="Donación de Ropa">
                    <div class="card-body text-center">
                        <h5 class="card-title">Donación de ropa</h5>
                        <p>A través de tus contribuciones, ayudamos a personas en situación de vulnerabilidad a obtener prendas necesarias para su día a día.</p>
                        <button class="btn btn-custom" onclick="window.open('donacion_ropa.php', '_blank')">Dona</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
