<?php

$peticion_Ajax = true;
require_once '../config/app.php';
require_once '../controller/UserController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        if (isset($_POST['apellido'])) {

            //instancia al controlador
            require_once '../controller/UserController.php';
            $ins_user = new UserController();

            if (isset($_POST['usuario']) && isset($_POST['telefono'])) {
                $response = $ins_user->AgregarUsuario_Controller();

                echo json_encode($response);
                exit();
            }

        }
    
} else {
    // Método de solicitud no permitido
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    session_start(['name'=>'WLB']); 
    session_unset();
    session_destroy();
    header("Location: ".URL_BASE."login/");
    exit();
}


