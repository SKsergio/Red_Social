<?php
if ($_SERVER['REQUEST_METHOD'] =='POST') {
    $mensaje = 'Los datos han sido recibidos';

    $response = array(
        'mensaje' => $mensaje
    );

    echo json_encode($response);
};