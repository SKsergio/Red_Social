<?php

if ($peticion_Ajax) {
    require_once __DIR__ . '/../model/LoginModel.php';
} else {
    require_once __DIR__ . '/../model/LoginModel.php';
}
class LoginController extends LoginModel{

    //creamos el controlador para iniciar sesion
    public function IniciarSesionControlador(){
        $user = MainModel::Limpiar_Cadena($_POST['user_login']);
        $clave = MainModel::Limpiar_Cadena($_POST['password_login']);

        //comprobar campos vacios
        if ($user === ''|| $clave ==='') {
            echo "
            <script>
                Swal.fire({
                    title: 'Ocurrió un error',
                    text: 'Uno o ambos campos están vacíos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            </script>
            ";            
        }

        $datos_login =['user_login'=>$user, 'password_login'=>$clave];

        $datosCuenta = LoginModel::IniciarSesionModelo($datos_login);

        if ($datosCuenta->rowCount()==1) {
            $row = $datosCuenta->fetch(PDO::FETCH_ASSOC);;

            session_start(['name'=>'WLB']); 

            $_SESSION['id_WLB']=$row['id_user'];
            $_SESSION['user_WLB']=$row['user'];
            $_SESSION['nombre_WLB']=$row['Nombre_Real'];
            $_SESSION['Apellido_WLB']=$row['apellido'];
            $_SESSION['token_WLB']=md5(uniqid(mt_rand(),true));

            return header("Location: ".URL_BASE."profile/");
        }else{
            echo"
            <script>
                Swal.fire({
                title: 'Ocurrio un error',
                text: 'El usuario o la contraseña estan incorrectos',
                icon: 'error',
                confirmButtonText: 'Aceptar' 
                });
            </script>  
            ";
        }
    }
}
