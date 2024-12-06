<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qué Hacemos - Fundación FAHAIP PANAMÁ</title>
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
                <h2>Qué Hacemos</h2>
                <p>Nos dedicamos a mejorar la vida de las comunidades menos favorecidas a través de la educación, la salud y el desarrollo social.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <img src="img/asistencia social.png" class="card-img-top card-img-top-custom" alt="Asistencia Social">
                    <div class="card-body text-center">
                        <h5 class="card-title">Asistencia Social</h5>
                        <p>Proveemos ayuda y soporte a las personas más necesitadas a través de diversos programas de asistencia social.</p>
                        <button class="btn btn-custom" onclick="window.open('asistencia_social.php', '_blank')">Más información</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <img src="img/brindar-asistencia-alimentaria-victimas-desastre-natural-tsunami_7496-1575.avif" class="card-img-top card-img-top-custom" alt="Ayuda Alimentaria">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ayuda Alimentaria</h5>
                        <p>Proveemos alimentos a las familias necesitadas para garantizar su nutrición y bienestar.</p>
                        <button class="btn btn-custom" onclick="window.open('ayuda_alimentaria.php', '_blank')">Más información</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom">
                    <img src="img/asistencia medica.png" class="card-img-top card-img-top-custom" alt="Asistencia Médica">
                    <div class="card-body text-center">
                        <h5 class="card-title">Asistencia Médica</h5>
                        <p>Ofrecemos servicios médicos y apoyo sanitario a las comunidades menos favorecidas.</p>
                        <button class="btn btn-custom" onclick="window.open('asistencia_medica.php', '_blank')">Más información</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
