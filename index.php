<?php
require_once './config/app.php';
require_once './controller/VistaControlador.php';

$plantilla = new VistaControlador();
$plantilla->Obtener_Plantilla_Controlador();
?>