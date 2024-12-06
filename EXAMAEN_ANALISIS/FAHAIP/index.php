<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundación FAHAIP PANAMÁ</title>
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
                <a class="navbar-brand" href="#"><img src="img/logo fahaip.png" alt="Logo Fundación FAHAIP" style="width: 40px;"> Fundación FAHAIP</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="que_hacemos.php">Qué hacemos</a></li>
                        <li class="nav-item"><a class="nav-link" href="voluntariado.php">Voluntario</a></li>
                        <li class="nav-item"><a class="nav-link" href="donaciones.php">Donación</a></li> <!-- Corrige el enlace aquí -->
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-magnifying-glass"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-share-alt"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Carrusel de imágenes -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/portada principal.png" class="d-block w-100" alt="Banner de Fundación FAHAIP">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Fundación FAHAIP PANAMÁ</h5>
                    <button class="btn btn-warning" onclick="location.href='que_hacemos.php'"><img src="img/coranzones.png" alt="Corazón" style="width: 24px;"> Qué hacemos</button>
                    <p>Nos dedicamos a mejorar la vida de las comunidades menos favorecidas a través de la educación, la salud y el desarrollo social.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/imagenes-blog-wv-banner.webp" class="d-block w-100" alt="Segunda Imagen">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Proyectos Comunitarios</h5>
                    <p>Iniciativas para el desarrollo social.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <main>
        <section id="noticias">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Noticias de la Fundación</h2>
                        <p>Mantente al tanto de las últimas noticias y eventos de la Fundación FAHAIP PANAMÁ.</p>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-md-4 mb-4">
                        <div class="card card-custom">
                            <img src="img/noticia1.jpg" class="card-img-top card-img-top-custom" alt="Noticia 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">Alianza con Medcom</h5>
                                <p>La Fundación FAHAIP PANAMÁ ha firmado un convenio con Medcom para promover el emprendimiento y la innovación en Panamá.</p>
                                <button class="btn btn-custom" onclick="location.href='noticia_alianza_medcom.php'">Leer más</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card card-custom">
                            <img src="img/noticia2.jpg" class="card-img-top card-img-top-custom" alt="Noticia 2">
                            <div class="card-body text-center">
                                <h5 class="card-title">Fortalecimiento de Startups y PYMES</h5>
                                <p>La CAF ha firmado una alianza estratégica con la Fundación FAHAIP PANAMÁ para fortalecer startups, scaleups y pymes escalables.</p>
                                <button class="btn btn-custom" onclick="location.href='noticia_fortalecimiento_startups.php'">Leer más</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card card-custom">
                            <img src="img/noticia3.jpg" class="card-img-top card-img-top-custom" alt="Noticia 3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Nueva Campaña de Recolección de Fondos</h5>
                                <p>La Fundación FAHAIP PANAMÁ ha lanzado una nueva campaña para recolectar fondos destinados a sus proyectos sociales.</p>
                                <button class="btn btn-custom" onclick="location.href='noticia_campana_recoleccion.php'">Leer más</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="voluntario" class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <img src="img/voluntario.png" class="img-fluid" alt="Voluntariado">
                </div>
                <div class="col-lg-6">
                    <h2>INTÉGRATE A LA COMUNIDAD</h2>
                    <p>Únete a la comunidad de FAHAIP y marca la diferencia. Como voluntario, tendrás la oportunidad de contribuir directamente a nuestros proyectos y programas, ayudando a mejorar la vida de personas en situaciones vulnerables. Tu tiempo y dedicación son esenciales para crear un impacto positivo y duradero.</p>
                    <p>Al unirte a nosotros, colaborarás en diversos proyectos de asistencia social, educación y salud, contribuyendo a construir un futuro más justo y equitativo.</p>
                    <button class="btn btn-primary" onclick="window.location.href='voluntariado.php'">Quiero ser voluntario</button>
                </div>
            </div>
        </section>



        <!-- Footer -->
        <footer class="footer bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Contacto</h4>
                        <ul class="contact-info">
                            <li><span>Dirección:</span> Calle Principal, Ciudad</li>
                            <li><span>Teléfono:</span> +123 456 789</li>
                            <li><span>Email:</span> info@fahaip.org</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Síguenos en</h4>
                        <ul class="social-links">
                            <li><a href="#"><img src="img/redes4.png" alt="Facebook"></a></li>
                            <li><a href="#"><img src="img/redes3.png" alt="Instagram"></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Suscríbete</h4>
                        <form action="#">
                            <input type="email" class="form-control" placeholder="Correo Electrónico">
                            <button type="submit" class="btn btn-primary btn-block">Suscribirse</button>
                        </form>
                    </div>
                </div>
                <hr>
                <p class="text-center">© 2024 Fundación FAHAIP. Todos los derechos reservados.</p>
            </div>
        </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
