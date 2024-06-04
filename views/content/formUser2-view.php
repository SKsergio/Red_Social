<div class="main">
    <div class="conat"> 
        <form id="Form_Sex" action="<?php echo URL_BASE?>formUser3/" method="POST" class="FormSex">
            <h1 class="How_Name">¿Con qué género te identificas?</h1>
            <div class="form-group">
                <p>Elige el género con el que te identificas</p>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="genero" value="masculino"> Hombre
                    </label>
                    <label>
                        <input type="radio" name="genero" value="femenina"> Mujer
                    </label>
                </div>
                <span  id="error-genero"></span>
            </div>
            <div class="form-group">
                <label for="telefono">¿Cuál es tu número de celular?</label>
                <p>Ingresa un número de celular de contacto. Nadie más lo verá.</p>
                <div class="input-group">
                    <input type="number" id="telefono" name="telefono" placeholder=" ">
                    <label for="telefono">Número de celular</label>
                </div>
                <span class="error-message" id="error-telefono"></span>
            </div>
            <div class="button-group">
                <button type="submit" id="loginBtn" class="FormUser_BTN">Siguiente</button>
            </div>
        </form>
    </div>
</div> 