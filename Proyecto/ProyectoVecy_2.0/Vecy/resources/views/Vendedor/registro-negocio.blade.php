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

                </div>

                <!-- Botón de Envío -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                </div>
            </form>

