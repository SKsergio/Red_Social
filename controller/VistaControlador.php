<?php
//incluimos el modelo
require_once './model/VistasModelo.php';

//creamos la clase
class VistaControlador extends VistasModelo{

    //Controlador para obtener plantilla y mostrarla en el index.php
    public function Obtener_Plantilla_Controlador(){
        return require_once './views/plantilla.php';
    }

    //Controlador para obtener las vistas que se cargaran en la plantilla
    public function Obtener_vistas_Controlador(){
        //esta variable views se encarga de traer toda la ruta
        if (isset($_GET['views'])) {
            $ruta = explode('/',$_GET['views']);
            $respuesta = VistasModelo::Obtener_Vistas_Modelo($ruta[0]);
        }else {
            $respuesta = 'login';
        }
        return $respuesta;
    }
}