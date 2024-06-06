<?php

$peticion_Ajax = true;
require_once '../config/app.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);

    $data = $datos[0];
    $fecha_nacimiento = isset($data['fecha']) ? $data['fecha'] : null;
    $apellido = $data['apellido'];
    $nombre = $data['nombre'];
    $usuario = $data['usuario'];
    $password = $data['password'];
    $telefono = $data['telefono'];
    $correo = $data['correo'];
    $genero = $data['genero'];
    


    // Aquí simplemente devolvemos los datos recibidos
    header('Content-Type: application/json');
    
    
    echo json_encode([
        'message' => 'Datos enviados correctamente',
        'nombre' => $data,
        'apellido' => $apellido,
        'usuario' => $usuario,
        'fecha_nacimiento' => $fecha_nacimiento,
        'password' => $password,
        'telefono' => $telefono,
        'correo' => $correo,
        'genero' => $genero,
        
    ]);
    
} else {
    // Método de solicitud no permitido
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}

