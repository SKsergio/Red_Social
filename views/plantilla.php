<?php
    $peticion_Ajax = false;
    require_once './controller/VistaControlador.php';
    $IV = new VistaControlador();

    $vista = $IV->Obtener_vistas_Controlador();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo COMPANY;?></title>
    <!-- links generales -->
    <?php include ('./views/templates/linksGenerales.php')?>
    <!-- incluimos los links de estilo dependiendo de la view -->
    <?php if ($vista != 'login' && $vista != '404' && $vista != 'formUser1') { ?>
        <!-- incluimos el menu -->
        <?php include ('./views/templates/linksApp.php');?>
    <?php }else{
        include ('./views/templates/linksLogin.php');
    } ?>

    
</head>
<body>
    <header>
        <?php if ($vista != 'login' && $vista != '404' && $vista != 'formUser1') { ?>
            <!-- incluimos el menu -->
            <?php include ('./views/templates/header.php');?>
        <?php } ?>
    </header>

    <!-- cuerpo -->
    <main>
        <?php
        if ($vista == 'login' || $vista == '404' || $vista == 'formUser1') {
            require_once './views/content/'.$vista.'-view.php';
        }else {
            include $vista;
        }
        ?>
    </main>
    <!-- fin del body -->
    
    <!-- incluimos el footer -->
    <?php include('./views/templates/footer.php'); ?>

    <!-- incluimos los scripts js -->
    <?php include('./views/templates/scripts.php'); ?>
</body>
</html>