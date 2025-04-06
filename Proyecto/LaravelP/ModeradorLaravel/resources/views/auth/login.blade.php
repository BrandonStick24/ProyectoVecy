<div class="modal fade" id="loginPop" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content p-3" style="border-radius: 20px; width: 400px; background: transparent; border: none;">
      <div class="modal-body">
        <div class="login-container">
          <div class="login-box">
            <div class="logolore">
              <img class="imglore" src="{{ asset('img/WhatsApp Image 2024-11-21 at 3.45.29 PM.jpeg') }}" alt="">
            </div>
            <p class="p">Iniciar sesión</p>
            <form id="loginForm"> 
              <div class="input-group">
                <label for="email">Correo</label>
                <input type="email" id="email" placeholder="Ingresa el Correo" required>
              </div>
              <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Ingrese la contraseña" required>
              </div>
              <div class="options">
                <label>
                  <input type="checkbox" id="remember-me">
                  Recuérdame
                </label>
                <a href="#" class="forgot-password">¿Olvidó contraseña?</a>
              </div>
              <button type="submit" class="login-btn">Ingresar</button>
              <p id="error-message" style="display: none; color: red;"></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>