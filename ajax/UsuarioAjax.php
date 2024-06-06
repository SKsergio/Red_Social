<?php

$peticion_Ajax = true;
require_once '../config/app.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);
    
        if (isset($datos['data'][0]['foto_perfil'])) {
            //instancia al controlador
            require_once '../controller/UserController.php';
            $ins_user = new UserController();

            echo $ins_user->AgregarUsuario_Controller();
        }

    // Aquí simplemente devolvemos los datos recibidos
    header('Content-Type: application/json');
    
    echo json_encode([
        'message' => 'Datos enviados correctamente',
        'data' => $datos
    ]);
    
} else {
    session_start(['name'=>'WLB']); 
    session_unset();
    session_destroy();
    header("Location: ".URL_BASE."login/");
    exit();
}


