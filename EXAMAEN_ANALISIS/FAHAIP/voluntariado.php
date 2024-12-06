<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <script>
        function showForm(formId) {
            var forms = document.querySelectorAll('.form-section');
            forms.forEach(function(form) {
                form.style.display = 'none';
            });
            document.getElementById(formId).style.display = 'block';
        }
    </script>
</head>
<body>
    <header>
        <div class="fixed-header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><img src="img/logo fahaip.png" alt="Logo Fundación FAHAIP" style="width: 40px;"> Fundación FAHAIP</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="que_hacemos.php">Qué hacemos</a></li>
                        <li class="nav-item"><a class="nav-link" href="voluntariado.php">Voluntario</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#donaciones">Donación</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-magnifying-glass"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-share-alt"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mt-5">
        <h2 class="text-center">Voluntariado</h2>
        <p class="text-center">Elige una opción para continuar:</p>
        <div class="row text-center">
            <div class="col-md-6">
                <button class="btn btn-primary" onclick="showForm('formRegistro')">Quiero ser parte</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary" onclick="showForm('formTareas')">Mis Tareas, Capacitación y Evaluación</button>
            </div>
        </div>
        
        <div id="formRegistro" class="form-section mt-4" style="display: none;">
            <h3>Formulario de Registro</h3>
            <form method="post" action="procesar_voluntariado.php">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="comision">Comisión</label>
                    <select class="form-control" id="comision" name="comision" required>
                        <option value="AMBIENTAL">AMBIENTAL</option>
                        <option value="EDUCATIVO">EDUCATIVO</option>
                        <option value="EQUIPO DE SALUD">EQUIPO DE SALUD</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="disponibilidad">Disponibilidad</label>
                    <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>

        <div id="formTareas" class="form-section mt-4" style="display: none;">
            <h3>Mis Tareas, Capacitación y Evaluación</h3>
            <p>Esta sección contendrá la información sobre tus tareas, oportunidades de capacitación y evaluaciones.</p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer bg-dark text-white mt-5">
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
    <script src="https://stackpath.bootstrap.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
