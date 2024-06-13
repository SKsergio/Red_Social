<?php
if ($_GET) {
    $Noun1 = (isset($_GET['Nom'])?$_GET['Nom']:"");
}
require_once './controller/MostrarFotosController.php';
require_once './controller/ShowPostsController.php';
//aca vamos a obtener las fotos de perfil para mostrarla en sus respectivos lugares

$Nombre =$Noun1; 
$Noun = $_SESSION['nombre_WLB'];

$ins_Fotos = new MostarFotosController();
$ArrayFotos = $ins_Fotos->ObtenerFotos($Nombre);

//mostrar post del usurio
$ins_posts = new ShowPostsController();
$lista_posts = $ins_posts->PosforOneProfile($Nombre);

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
            </div>
        </div>
    </div>

    <div class="perfil-content">
        <div class="navegacion">
            <a href="#pub_container">Publicaciones</a>
            <a href="#">Amigos</a>
        </div>
        <div class="detalles">
            <!-- <p><i class="icon"></i>Cumpleaños:</p> -->
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
    <div class="publication__profile" id="pub_container">
        <?php foreach($lista_posts as $posts){?>

            <div class="posters_img">
                <img class="img_post_ct" src="<?php echo URL_BASE.'views/css/photos/'.$posts['foto_Publicacion']?>" alt="foto">
                <p><?php echo $posts['mensaje'];?></p>
            </div>

        <?php } ?>
    </div>

</div>