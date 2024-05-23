<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo COMPANY;?></title>
    <!-- incluimos los links de estilo -->
    <?php include ('./views/templates/links.php')?>
</head>
<body>
    <header>
        <?php
        $peticion_Ajax = false;
        require_once './controller/VistaControlador.php';
        $IV = new VistaControlador();

        $vista = $IV->Obtener_vistas_Controlador();
        ?>
        
        <?php if ($vista != 'login' && $vista != '404') { ?>
            <!-- incluimos el menu -->
            <?php include ('./views/templates/header.php');?>
        <?php } ?>
    </header>

    <!-- cuerpo -->
    <main>
        <?php
        if ($vista == 'login' || $vista == '404') {
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