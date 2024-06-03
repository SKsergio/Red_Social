<?php

//creamos la clase
class VistasModelo{
    //Modelo para obtener las vistas

    /*Nota: Este modelo no va interactuar directamente con la base de datos, sino que va interactuar con 
    las vistas que estan en la carpeta de views*/
    protected static function Obtener_Vistas_Modelo($vistas){
        $lista_Blanca= ['home','profile','friend_profile','mensajeria'];
        //comprobamos que la vista se encuentre en la lista de vistas permitidas
        if (in_array($vistas, $lista_Blanca)) {
            //vamos a comprobar que este archivo exista
            if (is_file('./views/content/'.$vistas.'-view.php')) {
                $contenido = './views/content/'.$vistas.'-view.php';
            }else{
                $contenido = '404';
            }
        }elseif ($vistas == 'login' || $vistas == "index") {
            $contenido = 'login';
        }elseif ($vistas == 'formUser1') {
            $contenido = 'formUser1';
        }elseif ($vistas == 'formUser2') {
            $contenido = 'formUser2';
        }elseif ($vistas == 'formUser3') {
            $contenido = 'formUser3';
        }elseif($vistas == 'formUser4'){
            $contenido = 'formUser4';
        }
        else{
            $contenido = '404';
        }
        return $contenido;
    }

}