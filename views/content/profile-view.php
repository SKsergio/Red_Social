<?php
require_once './controller/MostrarFotosController.php';
//aca vamos a obtener las fotos de perfil para mostrarla en sus respectivos lugares
$Nombre =$_SESSION['user_WLB']; 

$ins_Fotos = new MostarFotosController();
$ArrayFotos = $ins_Fotos->ObtenerFotos($Nombre);

?>
<div class="profile__content">

    <div class="perfil-header">
        <div class="cover-photo">
            <a href="#image1">
            <img src="<?php echo URL_BASE.'views/css/photos/'. $ArrayFotos[1];?>" alt="">
            </a> 
        </div>
        <div class="perfil-info">
            <div class="perfil-picture">
                <a href="#image2">
                <img class="photo_profile" src="<?php echo URL_BASE.'views/css/photos/'. $ArrayFotos[0];?>" alt="">
                </a>
            </div>
            <div class="perfil-details">
                <h1><?php echo $Nombre ?></h1>
                <div class="buttons">
                    <a href="#Create_publications">
                        <button class="btn_createpublication">+ Agregar publicacion</button>
                    </a>
                    <a href="#formularioEditar">
                        <button class="btn_editar_user">Editar perfil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="perfil-content">
        <div class="navegacion">
            <a href="#">Publicaciones</a>
            <a href="#">Amigos</a>
        </div>
        <div class="detalles">
            <h2>Detalles</h2>
            <p><i class="icon"></i>Nombre Real</p>
            <p><i class="icon"></i>Cumpleaños</p>
        </div>
    </div>

    <article class="light-box" id="image1">
        <img src="<?php echo URL_BASE.'views/css/photos/'. $ArrayFotos[1];?>" alt="" class="foto_portada">
        <a href="#" class="close">x</a>      
    </article>

    <article class="light-box" id="image2">
    <img src="<?php echo URL_BASE.'views/css/photos/'. $ArrayFotos[0];?>" alt="" class="foto_perfil">
        <a href="" class="close">x</a>     
    </article>

    <!-- editar datos -->
    <div class="conat popup">
        <form action="../../ajax/EditarFotosAjax.php" method="post" enctype="multipart/form-data" id="formularioEditar">
            <h2>Edita tus Datos</h2>
            <div class="perfil-picture">
                <div class="section-header">
                    <label for="perfil-picture-upload" class="custom-file-upload file">Seleccione una nueva foto de perfil</label>
                    <input id="perfil-picture-upload" type="file" name="perfil_picture" accept="image/jpeg" style="display: none;">
                </div>
                <div class="imagen_editar">
                    <img id="perfilPreview" src="" alt="Vista previa de la foto de portada" style="display: none;">
                </div>
            </div>
            <div class="cover-photo">
                <div class="section-header">
                    <label for="cover-photo-upload" class="custom-file-upload file">Seleccione una nueva foto de portada</label>
                    <input id="cover-photo-upload" type="file" name="cover_photo" accept="image/jpeg" style="display: none;">
                </div>
                <div class="imagen_editar">
                    <img id="coverPreview" src="" alt="Vista previa de la foto de portada" style="display: none;">
                </div>
            </div>
            <div class="name-field">
                <div class="section-header" id="Nombre_user_content">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" name="username" value="Raul Ramirez" id="username" >
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="edit-button" value="Guardar cambios">
            </div>
            <span class="error_1"></span>
        </form>
        <a href="#" class="close btncls">x</a>   
    </div>

    <!-- subir publicaciones -->
    <div class="showCreate_publication">
        <div class="post-container" id="Create_publications">
            <div class="post-header">
                <img src="<?php echo URL_BASE.'views/css/photos/'. $ArrayFotos[0];?>" alt="Foto de perfil">
                <h2>Crear publicación</h2>
            </div>
            <form action="../../ajax/PublicacionesAjax.php" method="post" enctype="multipart/form-data" class="create_publication" id="create_publication">
                <div class="post-body">
                    <label for="mensaje">Escribe un comentario para la foto</label>

                    <textarea name="mensaje" id="mensaje" rows="5" cols="50" placeholder="Es un dia increible, no?"></textarea>

                    <label for="photo_publication" class="file">Subir Foto</label>
                    <input id="photo_publication" type="file" name="photo" accept="image/jpeg">

                    <img id="publicationPreview" src="" alt="Vista previa de la foto de portada" style="display: none;">

                </div>
                <div class="post-footer">
                    <button type="submit">Publicar</button>
                </div>
                <span class="error_2"></span>
            </form>
        </div>
        <a href="#" class="close clpost">x</a>  
    </div>
    
    

    <!-- Ya funciona el login y recuoeramos datos, solo nos queda recuperar las fotos y esas cosas -->

    <!-- contenedor de las publicaciones -->
    <div class="publication__profile">

    </div>

</div>