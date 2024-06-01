<div class="main">
    <div class="conat">
        <h1 class="How_Name">¿Cómo te llamas?</h1>
        <form id="paso" action="../FormRegistro/form3.php" method="POST">
            <div class="form-group">
                <label for="nombre">Ingresa tu nombre verdadero, un nombre y un apellido</label>
                <div class="form-inline">
                    <div class="input-group">
                        <input type="text" id="nombre" name="nombre" placeholder=" " required>
                        <label for="nombre">Nombre</label>
                        <span class="error" id="error-nombre">Este campo es obligatorio.</span>
                    </div>
                    <div class="input-group">
                        <input type="text" id="apellido" name="apellido" placeholder=" " required>
                        <label for="apellido">Apellido</label>
                        <span class="error" id="error-apellido">Este campo es obligatorio.</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h1 class="How_Name">¿Cuándo naciste?</h1>
                <label for="nombre">Ingresa tu fecha de nacimiento, se requiere que seas mayor de edad</label>
                <div class="input-group">
                    <input type="date" id="fecha" name="fecha" placeholder=" " required min="1950-01-01" max="2024-06-30" oninput="calculateedad()">
                    
                    <label for="fecha">Fecha de nacimiento</label>
                    <span id="edad"></span>
                    <span class="error" id="error-fecha">Este campo es obligatorio.</span>
                </div>
            </div>
            <div class="button-group">
                <button type="submit">Siguiente</button>
            </div>
        </form>
    </div>
</div>