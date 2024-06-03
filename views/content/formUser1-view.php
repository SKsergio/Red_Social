<div class="main"> 
    <div class="conat">
        <h1 class="How_Name">¿Cómo te llamas?</h1>
        <form id="FormEdad" action="<?php echo URL_BASE?>formUser2/" method="POST" class="FormEdad">
            <div class="form-group">
                <label for="nombre">Ingresa tu nombre verdadero, un nombre y un apellido</label>
                <div class="form-inline">

                    <div class="input-group">
                        <input type="text" id="nombre" name="nombre" placeholder=" ">
                        <label for="nombre">Nombre</label>
                        <span id="error-nombre"></span>
                    </div>

                    <div class="input-group">
                        <input type="text" id="apellido" name="apellido" placeholder=" " >
                        <label for="apellido">Apellido</label>
                        <span  id="error-apellido"></span>
                    </div>
 
                </div>
            </div>
            <div class="form-group">
                <h1 class="How_Name">¿Cuándo naciste?</h1>
                <label for="nombre">Ingresa tu fecha de nacimiento, se requiere que seas mayor de edad</label>

                <div class="input-group">
                    <input type="date" id="fecha" name="fecha" placeholder=" "  min="1950-01-01" max="2024-06-30" oninput="calculateedad()">
                    
                    <label for="fecha">Fecha de nacimiento</label>
                    <span id="edad"></span>
                    <span  id="error-fecha"></span>
                </div>
                
            </div>
            <div class="button-group">
                <button type="submit" id="loginBtn" class="FormUser_BTN">Siguiente</button>
            </div>
        </form>
    </div>
</div>