<?php
// conexion rapida
require_once '../ajax/conexionrapida.php';
$peticion_Ajax = true;
require_once '../config/app.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Iniciar el buffer de salida para capturar cualquier salida no deseada
    ob_start();
    //variables a utilizar
    $correo = $_POST['correo'];
    $user = $_POST['usuario'];
    $Tipo_perfil = 'ProfilePhoto';
    $Tipo_Portada = 'CoverPhoto';

    $foto_perfil = isset($_FILES['foto_perfil']['name'])?$_FILES['foto_perfil']['name']:"";
    $foto_portada = isset($_FILES['foto_portada']['name'])?$_FILES['foto_portada']['name']:"";

    // Validar correo
    $chek_correo = $conexion->prepare("SELECT correo FROM usuario WHERE correo = :CORREO");
    $chek_correo->bindParam(":CORREO", $correo);
    $chek_correo->execute();

    //validar Usuario
    $chek_USER = $conexion->prepare("SELECT user FROM usuario WHERE user = :USER");
    $chek_USER->bindParam(":USER", $user);
    $chek_USER->execute();

    if ($chek_correo->rowCount() > 0 || $chek_USER->rowCount() >0) {
        $response = array(
            'message' => 'El correo o el usuario que estás intentando ingresar ya existe'
        );
    } else {
        //procedemos a hacer la insercion en la tabla usuarios
        $insertar = $conexion->prepare("INSERT INTO usuario(`user`,`password`,`correo`,`fecha_nacimiento`,`genero`,`telefono`,`apellido`,`Nombre_Real`) 
        VALUES(:USER, :PASS, :GMAIL, :FECHA, :GENERO, :PHONE, :LAST_NAME, :NOMBRE)");

        $insertar->bindParam(":USER", $_POST['usuario']);
        $insertar->bindParam(":PASS", $_POST['password']);
        $insertar->bindParam(":GMAIL", $_POST['correo']);
        $insertar->bindParam(":FECHA", $_POST['fecha']);
        $insertar->bindParam(":GENERO", $_POST['genero']);
        $insertar->bindParam(":PHONE", $_POST['telefono']);
        $insertar->bindParam(":LAST_NAME", $_POST['apellido']);
        $insertar->bindParam(":NOMBRE", $_POST['nombre']);

        $insertar->execute();

        //hay que obtener el id del usuario que acabamos de ingresar
        $obtenerID = $conexion->prepare("SELECT id_user FROM `usuario` WHERE correo = :CORREO_VALIDACION");
        $obtenerID->bindParam(":CORREO_VALIDACION",$correo);
        $obtenerID->execute();
        $result = $obtenerID->fetch(PDO::FETCH_ASSOC);
        $ID_USER = $result['id_user'];
        
        //ahora insertamos en la tabla perfil
        $insertar_perfi = $conexion->prepare("INSERT INTO perfil(`id_user`) VALUES(:ID_USER)");
        $insertar_perfi->bindParam(":ID_USER",$ID_USER);
        $insertar_perfi->execute();

        //OBTENEMOS EL ID DE PERFIL
        $obtener_id_perfil = $conexion->prepare('SELECT id_perfil FROM perfil WHERE id_user = :IDUSER');
        $obtener_id_perfil->bindParam(":IDUSER",$ID_USER);
        $obtener_id_perfil->execute();
        $result_id_perfil = $obtener_id_perfil->fetch(PDO::FETCH_ASSOC);
        $ID_PERFIL = $result_id_perfil['id_perfil'];


        $fecha_Foto = new DateTime();
        $nombreArchivoFotoPerfil = ($foto_perfil!='')?$fecha_Foto->getTimestamp().'_'.$_FILES['foto_perfil']['name']:"";
        $tmp_imgperfil=$_FILES['foto_perfil']['tmp_name'];
        if ($tmp_imgperfil!= '') {
            move_uploaded_file($tmp_imgperfil,'../views/css/photos/'.$nombreArchivoFotoPerfil);
        }

        $fecha_Foto2 = new DateTime();
        $nombreArchivoFotoPortada = ($foto_portada!='')?$fecha_Foto2->getTimestamp().'_'.$_FILES['foto_portada']['name']:"";
        $tmp_imgperfil=$_FILES['foto_portada']['tmp_name'];
        if ($tmp_imgperfil!= '') {
            move_uploaded_file($tmp_imgperfil,'../views/css/photos/'.$nombreArchivoFotoPortada);
        }
        
        //insertar en fotoportada, fotoperfil y fotos compartidas(funcionaaaaaaaaaaa ahhhhhhhhhhhhhhh)
        $insertar_foto_perfil = $conexion->prepare("INSERT INTO fotos_compartidas(`Id_tipo_Foto`, `Foto`, `id_perfil`) VALUES (:TIPO, :FOTO, :ID_PERFIL)");
        $insertar_foto_perfil->bindParam(":TIPO", $Tipo_perfil, PDO::PARAM_STR);
        $insertar_foto_perfil->bindParam(":FOTO", $nombreArchivoFotoPerfil);
        $insertar_foto_perfil->bindParam(":ID_PERFIL",$ID_PERFIL);
        $insertar_foto_perfil->execute();

        $insertar_foto_portada = $conexion->prepare("INSERT INTO fotos_compartidas(`Id_tipo_Foto`, `Foto`, `id_perfil`) VALUES (:TIPO, :FOTO, :ID_PERFIL)");
        $insertar_foto_portada->bindParam(":TIPO", $Tipo_Portada, PDO::PARAM_STR);
        $insertar_foto_portada->bindParam(":FOTO", $nombreArchivoFotoPortada);
        $insertar_foto_portada->bindParam(":ID_PERFIL",$ID_PERFIL);
        $insertar_foto_portada->execute(); 

        //obtener el id de la foto compartida para perfil
        $obtener_id_foto = $conexion->prepare("SELECT Id_Foto_Compartida FROM fotos_compartidas WHERE id_perfil = :ID_PERFIL AND Id_tipo_Foto = :TIPO_PERFIL");
        $obtener_id_foto->bindParam(":ID_PERFIL",$ID_PERFIL);
        $obtener_id_foto->bindParam(":TIPO_PERFIL",$Tipo_perfil);
        $obtener_id_foto->execute();
        $Result_ID_FOTOPERFIL = $obtener_id_foto->fetch(PDO::FETCH_ASSOC);
        $ID_FOTO_PERFIL = $Result_ID_FOTOPERFIL['Id_Foto_Compartida'];

        //obtener el id de la foto compartida para la portada
        $obtener_id_fotoPortada = $conexion->prepare("SELECT Id_Foto_Compartida FROM fotos_compartidas WHERE id_perfil = :ID_PERFIL AND Id_tipo_Foto = :TIPO_PORTADA");
        $obtener_id_fotoPortada->bindParam(":ID_PERFIL",$ID_PERFIL);
        $obtener_id_fotoPortada->bindParam(":TIPO_PORTADA",$Tipo_Portada);
        $obtener_id_fotoPortada->execute();
        $Result_ID_FOTOPORTADA = $obtener_id_fotoPortada->fetch(PDO::FETCH_ASSOC);
        $ID_FOTO_PORTADA = $Result_ID_FOTOPORTADA['Id_Foto_Compartida'];

        //insertar en tabla fotos perfil
        $insertar_id_foto_perfil = $conexion->prepare("INSERT INTO fotos_perfil(`id_foto_compartida`) VALUES(:ID_FOTO_PERFIL)");
        $insertar_id_foto_perfil->bindParam(":ID_FOTO_PERFIL", $ID_FOTO_PERFIL);
        $insertar_id_foto_perfil->execute();
        // Obtener el ID del último registro insertado
        $lastInsertIdPerfil = $conexion->lastInsertId();

        //insertar en tabla fotos portada
        $insertar_id_foto_portada = $conexion->prepare("INSERT INTO fotos_portada(`id_foto_compartida`) VALUES(:ID_FOTO_PORTADA)");
        $insertar_id_foto_portada->bindParam(":ID_FOTO_PORTADA", $ID_FOTO_PORTADA);
        $insertar_id_foto_portada->execute();//hasta aca funciona
        $lastInsertIdPortada = $conexion->lastInsertId();
        
        //obtener el id de las fotos de perfil y portada
        $Obtener_id_tabla_perfil = $conexion->prepare("SELECT id_foto_perfil FROM fotos_perfil WHERE id_foto_compartida	= :ID"); 
        $Obtener_id_tabla_perfil->bindParam(":ID",$ID_FOTO_PERFIL);
        $Obtener_id_tabla_perfil->execute();
        $Resultado_perfil = $Obtener_id_tabla_perfil->fetch(PDO::FETCH_ASSOC);
        $ID_PHOTO_PROFILE =$Resultado_perfil['id_foto_perfil'];

        $Obtener_id_tabla_portada = $conexion->prepare("SELECT 	id_foto_portada FROM fotos_portada WHERE id_foto_compartida	= :ID"); 
        $Obtener_id_tabla_portada->bindParam(":ID",$ID_FOTO_PORTADA);
        $Obtener_id_tabla_portada->execute();
        $Resultado_portada = $Obtener_id_tabla_portada->fetch(PDO::FETCH_ASSOC);
        $ID_PHOTO_COVER =$Resultado_portada['id_foto_portada'];

        //finalmente haremos la actualizacion a la tabla de perfil 
        $AgregarDatosPerfil = $conexion->prepare("UPDATE perfil SET id_foto_portada= :FOTO_PORTADA ,id_foto_perfil= :FOTO_PERFIL WHERE id_perfil = :ID_INGRESAR");
        $AgregarDatosPerfil->bindParam(":FOTO_PORTADA",$ID_PHOTO_COVER);
        $AgregarDatosPerfil->bindParam(":FOTO_PERFIL",$ID_PHOTO_PROFILE);
        $AgregarDatosPerfil->bindParam(":ID_INGRESAR",$ID_PERFIL);
        $AgregarDatosPerfil->execute();

        //metemos esto
        //require_once __DIR__ . '/../model/LoginModel.php';

        // class prub extends LoginModel{

        //     public function IniciarSesionControlador(){
        //         $datos_inc = [$_POST['usuario']=>$user, $_POST['password']=>$clave];
        //         $datosCuenta = LoginModel::IniciarSesionModelo($datos_inc);

        //         session_start(['name'=>'WLB']); 

        //         $_SESSION['id_WLB']=$row['id_user'];
        //         $_SESSION['user_WLB']=$row['user'];
        //         $_SESSION['Fecha_WLB']=$row['fecha_nacimiento'];
        //         $_SESSION['nombre_WLB']=$row['Nombre_Real'];
        //         $_SESSION['Apellido_WLB']=$row['apellido'];
        //         $_SESSION['token_WLB']=md5(uniqid(mt_rand(),true));

        //         return URL_BASE."profile/";
        //     }
        // }
        // $newPrub = new prub();

        // echo $newPrub->IniciarSesionControlador();
       


        // NOTA: SERIA DE HACER UN CAMBIO EN LA BASE DE DATOS SE ELIMINARIAN 2 TABLAS Y SE AGREGARIA EL ID_PERFIL A LA TABLA DE 
        //FOTOS COMPARTIDAS PARA ACCEDER MAS COMODAMENTE A ESTAS FOTOS...

        $response = array(
            'message' => "La cuenta ha sido creada correctamente, Bienvenido a Walpweb $user",
        );
    }

    // Capturar cualquier salida inesperada
    $output = ob_get_clean();
    if (!empty($output)) {
        $response = array('error' => 'Salida inesperada: ' . $output);
    }

    // Enviar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Método de solicitud no permitido
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}
