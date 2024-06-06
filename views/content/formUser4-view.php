<div class="main">
    <div class="conat"> 
        <form id="Form_photo" action="<?php echo URL_BASE;?>ajax/prub.php" method="POST" enctype="multipart/form-data" class="Form_photo">
            <!-- notaaaaaaa utiliza el autocomplete=off que es para que los dformularios no se completen automaticamante -->
            <h1 class="How_Name">Selecciona una foto de Perfil</h1>
            <div class="form-group">
                <div class="input-group">
                    <input type="file" name="foto_perfil" id="foto" class="doc_form">
                </div>
                <span class="error-foto_perfil" id="error-foto_perfil"></span>
            </div>
            <div class="form-group">
                <label for="telefono">Selecciona una foto de Portada</label>
                <div class="input-group">
                    <input type="file" name="foto_portada" id="foto" class="doc_form">
                </div>
                <span class="error-foto_portada" id="error-foto_portada"></span>
            </div>
            <div class="button-group">
                <button type="submit" id="loginBtn" class="FormUser_BTN">Siguiente</button>
            </div>
        </form>
    </div> 
</div> 