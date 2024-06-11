<?php
session_start(['name'=>'WLB']); 
//tengo el id del usuario pero no del perfil
$id = $_SESSION['id_WLB'];//id de usurio

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../controller/publicationController.php';

    $formData = array();

    // Procesar archivos subidos
    foreach ($_FILES as $key => $file) {
        $formData[$key] = $file;
    }
    // Procesar otros datos del formulario
    foreach ($_POST as $key => $value) {
        $formData[$key] = $value;
    }

    $inst_post = new publicationController;
    $create_post = $inst_post->SetearDatosPublication($formData, $id);

    if ($create_post == true) {
        $mensaje = 'La publicacion se ha subido correctamente';
    }else{
        $mensaje = 'Ha ocurrido un error';
    }


    $response = array(
        'id'=>$id,
        'mensaje' => $mensaje
    );
    
    echo json_encode($response);

}