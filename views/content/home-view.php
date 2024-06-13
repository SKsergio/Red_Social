<?php
$Nombre =$_SESSION['user_WLB']; 
require_once './controller/ShowPostsController.php';
//aca ira el controller para mostrar publicaciones
$ins_posts = new ShowPostsController();

$lista_posts = $ins_posts->EnviarArrayPost();
?>


<div class="content_home">
    <!-- contenedor de las historias -->
    <div class="histories__container">

        <!-- <section class="histories_home">
            <div class="content__box">
                <div class="galery">
                    <div class="img-history" data-classname="historie" ><h3>Nombre</h3></div>
                    <div class="img-history" data-classname="historie" ><h3>Nombre</h3></div>
                    <div class="img-history" data-classname="historie" ><h3>Nombre</h3></div>
                </div>
            </div>
        </section> -->
    <!-- para futuras actualizaciones meteremos estados o historias de las personas, este codigo quedara aca por eso. -->
        
    </div>
    <!-- contenedor de las publicaciones -->
    <div class="publications__container">

        <section class="information__section__home">
  

            <form action="" method="post" class="form_search_pipol">

                <div class="searchbar">

                    <div class="shadow"></div>
                    <input type="text" placeholder="Search and find your friends..." class="input__search">
                    <ion-icon name="search-outline" class="icon__find"></ion-icon>

                </div>

            </form>
        </section>

       
        <div class="content_central_home">
            <?php foreach($lista_posts as $posts){

                if ($posts['Nombre'] == $Nombre) {
                    $username = 'Tu';
                    $link = URL_BASE ."profile/";
                }else{
                    $username = $posts['Nombre'];
                    $link = URL_BASE . 'friendprofile/?Nom=' . urlencode($posts['Nombre']);

                    //enviaremos por get el id del perfil del usuario para mostrar sus datos
                }
                ;?>
                <div class="publications">

                    <section class="header_publications">
                        <div class="profile_image_home">
                            <a href="<?php echo $link?>">
                                <img class="img_prf" src="<?php echo URL_BASE.'views/css/photos/'. $posts['Foto_Perfil'];?>" alt="foto_publicacion">
                            </a>
                        </div>
                        <a href="<?php echo $link;?>">
                            <p><?php echo $username;?></p>
                        </a>
                    </section>

                    <section class="image_publication__content">
                        <div class="image_publications">
                            <img class="img_pbl" src="<?php echo URL_BASE.'views/css/photos/'. $posts['foto_Publicacion'];?>" alt="foto_publicacion">
                        </div>
                    </section>

                    <section class="message__publication">
                        <p>
                            <?php echo $posts['mensaje'];?>
                        </p>
                    </section>

                    <section class="reactions">
                        <ion-icon name="heart-outline" class="reactions1"></ion-icon>
                        <ion-icon name="happy-outline" class="reactions2"></ion-icon>
                    </section>

                </div>    
                <?php } ?>  
                <!-- esto es un ejemplo de como se veran las publicaciones de los usuarios -->

        </div>
    </div>  
    
</div>
