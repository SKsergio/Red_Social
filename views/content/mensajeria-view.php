<div class="container">
    <div class="header"> 
        <h2>Editar perfil</h2>
    </div>
    <form action="editar.php" method="post" enctype="multipart/form-data">
        <div class="perfil-picture">
            <div class="section-header">
                <h3>Foto del perfil</h3>
                <label for="perfil-picture-upload" class="custom-file-upload">Editar</label>
                <input id="perfil-picture-upload" type="file" name="perfil_picture">
            </div>
            <img src="blech.jpg" alt="Foto de perfil">
        </div>
        <div class="cover-photo">
            <div class="section-header">
                <h3>Foto de portada</h3>
                <label for="cover-photo-upload" class="custom-file-upload">Editar</label>
                <input id="cover-photo-upload" type="file" name="cover_photo">
            </div>
            <img src="ichigo.jpg" alt="Foto de portada">
        </div>
        <div class="name-field">
            <div class="section-header">
                <h3>Nombre de usuario</h3>
                <input type="text" name="username" value="Raul Ramirez">
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="edit-button" value="Guardar cambios">
        </div>
    </form>
</div>