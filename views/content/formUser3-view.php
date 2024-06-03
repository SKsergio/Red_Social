<div class="main">
    <div class="conat">
        <form id="Form_Password" action="../FormRegistro/form5.php" method="POST">
            <h1 class="How_Name">Datos para inicio de sesión</h1>
            <div class="form-group">
                <label for="usuario">Crea un nombre de Usuario</label>
                <p>Elige un nombre de usuario, será con el que tus demás amigos en la red te van a identificar.</p>
                <div class="input-group">
                    <input type="text" id="usuario" name="usuario" placeholder=" ">
                    <label for="usuario">Usuario</label>
                    <span class="error-message" id="error-usuario"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="correo">Ingresa un correo electrónico</label>
                <p>Ingresa un correo electrónico que será con el cual tendrás vinculada tu cuenta de WalWeb</p>

                <div class="input-group">
                    <input type="email" id="correo" name="correo" placeholder=" ">
                    <label for="correo">Correo</label>
                    <span class="error-message" id="error-correo"></span>
                </div>

            </div>
            <div class="form-group">
                <label for="password">Crea una contraseña</label>
                <p>Debe ser mayor a 8 caracteres, al momento de darle siguiente, ten en cuenta que con estos datos tendrás que ingresar al momento de iniciar sesión en WalpWeb</p>
                
                <div class="input-group password-group">
                    <input type="password" id="password" name="password" placeholder=" " >
                    <label for="password">Contraseña</label>
                    <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
                    <span class="error-message" id="error-password"></span>
                </div>

            </div>
            <div class="form-group">
                <label for="confirm-password">Confirma tu contraseña</label>
                <p>La contraseña debe ser igual a la descrita en el ítem anterior</p>
                <div class="input-group password-group">
                    <input type="password" id="confirm-password" name="confirm-password" placeholder=" " required>
                    <label for="confirm-password">Confirmar contraseña</label>
                    <span class="toggle-password" onclick="togglePassword('confirm-password')">👁️</span>
                    <span class="error-message" id="error-confirm-password"></span>
                </div>
            </div>
            <div class="button-group">
                <button type="submit" id="loginBtn" class="FormUser_BTN">Siguiente</button>
            </div>
        </form> 
    </div>
</div>
