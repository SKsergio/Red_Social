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

    $mensaje = 'Los datos han sido recibidos';

    $response = array(
        'mensaje' => $mensaje
    );

    echo json_encode($response);
};