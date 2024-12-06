<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación Única - Fundación FAHAIP PANAMÁ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrap.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
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
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Formulario de Donación Única</h2>
        <form method="POST" action="donaciones.php">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" class="form-control" id="monto" name="monto" required>
            </div>
            <div class="form-group">
                <label for="metodo_pago">Método de Pago</label>
                <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje (Opcional)</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
            </div>
            <input type="hidden" name="tipo_donacion" value="Única">
            <button type="submit" class="btn btn-custom btn-block">Enviar Donación</button>
            <button type="button" class="btn btn-secondary btn-block" onclick="location.reload();">Actualizar</button>
        </form>
    </div>
</body>
</html>
