<div id="registro" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarRegistro()">&times;</span>
        <h2>Registro</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</div>