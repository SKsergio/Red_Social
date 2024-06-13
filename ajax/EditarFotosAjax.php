<?php
if ($_SERVER['REQUEST_METHOD'] =='POST') {
    require_once __DIR__ . '/../controller/MostrarFotosController.php';

    $formData = array();

    // Procesar archivos subidos
    foreach ($_FILES as $key => $file) {
        $formData[$key] = $file;
    }
    // Procesar otros datos del formulario
    foreach ($_POST as $key => $value) {
        $formData[$key] = $value;
    }

    $ins_edit = new MostarFotosController();
    $edit_data = $ins_edit->GestionarFotos($formData);

    if ($edit_data == true) {
        $mensaje = 'La publicacion se ha subido correctamente';
    }else{
        $mensaje = 'Ha ocurrido un error';
    }

    $response = array(
        'mensaje' => $mensaje
    );

    echo json_encode($response);
};