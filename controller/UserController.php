<?php

if ($peticion_Ajax) {
    require_once '../model/UserModel.php';
}else{
    require_once './model/UserModel.php';
}

class UserController extends UserModel{

    //creamos un controlador para agregar Usuario
    public function AgregarUsuario_Controller(){

        $fecha_nacimiento = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $genero = $_POST['genero'];

        $foto_perfil = isset($_FILES['foto_perfil']) ? $_FILES['foto_perfil'] : null;
        $foto_portada = isset($_FILES['foto_portada']) ? $_FILES['foto_portada'] : null;

        //validar que no existan
        $chek_correo = MainModel::ejecutar_Consulta_Simple("SELECT correo FROM usuario WHERE
        correo = '$Correo'");
        if ($chek_correo->rowCount()>0) {
            $response = array(
                'message' => 'El correo que estas intentando ingresar ya existe'
            );
            return $response;
            exit();
        }

         //validar que no existan
         $chek_usuario = MainModel::ejecutar_Consulta_Simple("SELECT user FROM usuario WHERE
         user = '$Usuario'");
         if ($chek_usuario->rowCount()>0) {
             $response = array(
                'message' => 'El usuario que estas ingresando ya existe'
             );
            return $response;
            exit();
         }

        //encriptando password
        $Contasenia_encriptada =MainModel::encryption($Contasenia);

        //enviamos los datos
        $response = array(
            'nombre'=>$Nombre_Usuario,
            'apellido'=> $Apellido_Usuario,
            'usuario'=>$Usuario,
            'correo'=>$Correo,
            'fecha'=>$fecha,
            'telefono'=>$Telefono,
            'genero'=>$Genero,
            'password'=>$Contasenia_encriptada
        );
        $agregarUsuario = UserModel::AgregarUsuario_Modelo($response);

       
    }
}