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
                <img src="<?php echo URL_BASE.'views/css/photos/'. $ArrayFotos[0];?>" alt="">
                </a>
            </div>
            <div class="perfil-details">
                <h1><?php echo $Nombre ?></h1>
                <div class="buttons">
                    <button>+ Agregar publicacion</button>
                    <button>Editar perfil</button>
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

    <!-- Ya funciona el login y recuoeramos datos, solo nos queda recuperar las fotos y esas cosas -->

    <!-- contenedor de las publicaciones -->
    <div class="publication__profile">

    </div>

</div>