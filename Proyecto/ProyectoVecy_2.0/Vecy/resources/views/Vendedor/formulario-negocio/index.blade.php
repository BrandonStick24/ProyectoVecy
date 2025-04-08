<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Negocio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <style>
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .form-title {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Registro de Negocio</h2>

            <!-- Formulario (POST a una ruta de Laravel) -->
            <form action="{{ route('negocio.store') }}" method="POST">
                @csrf <!-- Token CSRF para protección en Laravel -->

                <!-- Sección: Datos del Negocio -->
                <div class="form-section">
                    <h4 class="form-title">Datos del Negocio</h4>

                    <div class="mb-3">
                        <label for="nombre_negocio" class="form-label">Nombre del Negocio</label>
                        <input type="text" class="form-control" id="nombre_negocio" name="nombre_negocio" required>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-select" id="categoria" name="categoria" required>
                            <option value="" disabled selected>Seleccione una categoría</option>
                            <option value="restaurante">Restaurante</option>
                            <option value="panaderia">Panadería</option>
                            <option value="hotel">Hotel</option>
                            <option value="tecnologia">Tecnología</option>
                        </select>
                    </div>
                </div>

                <!-- Sección: Datos del Usuario -->
                <div class="form-section">
                    <h4 class="form-title">Datos del Usuario</h4>

                    <div class="mb-3">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="cc">Cédula de Ciudadanía (CC)</option>
                            <option value="ti">Tarjeta de Identidad (TI)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="numero_documento" class="form-label">Número de Documento</label>
                        <input type="text" class="form-control" id="numero_documento" name="numero_documento" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <!-- Botón de Envío -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript adicional (opcional) -->
    <script>
        // Ejemplo: Validación antes de enviar
        document.querySelector('form').addEventListener('submit', function(e) {
            if (!document.getElementById('categoria').value) {
                alert('Seleccione una categoría de negocio');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
