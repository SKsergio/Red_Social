<?php

if ($peticion_Ajax) {
    require_once '../model/UserModel.php';
}else{
    require_once './model/UserModel.php';
}

class UserController extends UserModel{

    //creamos un controlador para agregar Usuario
    public function AgregarUsuario_Controller(){
        //comprobando el correo y name
        $user_name = MainModel::Limpiar_Cadena();

       
    }
}
echo json_encode($response);