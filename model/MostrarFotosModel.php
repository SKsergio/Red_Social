<?php 

require_once __DIR__ . '/MainModel.php';

class MostarFotosModel extends MainModel {
    protected static function ObtenerFotoPerfil($Nombre) {
        $sql = MainModel::Conectar()->prepare("SELECT Foto_Perfil FROM vista_foto_perfil WHERE Nombre_Usuario = :User");
        $sql->bindParam(":User", $Nombre);
        $sql->execute();
        $response = $sql->fetch(PDO::FETCH_ASSOC);
        return $response['Foto_Perfil'];
    }

    protected static function ObtenerFotoPortada($Nombre) {
        $sql = MainModel::Conectar()->prepare("SELECT Foto_Portada FROM vista_foto_portada WHERE Nombre_Usuario = :User");
        $sql->bindParam(":User", $Nombre);
        $sql->execute();
        $response = $sql->fetch(PDO::FETCH_ASSOC);
        return $response['Foto_Portada'];
    }

    // editar foto de perfil
    protected static function EditarFotoPerfil($foto, $Id_fotoCompartida){

        $fecha_Foto = new DateTime();
        $nombreArchivoFotoPost = ($foto != '') ? $fecha_Foto->getTimestamp() . '_' . $_FILES['perfil_picture']['name'] : "";
        $tmp_imgpost = $_FILES['perfil_picture']['tmp_name'];
        if ($tmp_imgpost != '') {
            move_uploaded_file($tmp_imgpost, '../views/css/photos/' . $nombreArchivoFotoPost);
        }

        $conectar = MainModel::Conectar();
        $sql = $conectar->prepare("UPDATE `fotos_compartidas` SET `Foto` = :Foto WHERE `Id_Foto_Compartida` = :Id_ft");
        $sql->bindParam(":Id_ft", $Id_fotoCompartida);
        $sql->bindParam(":Foto", $nombreArchivoFotoPost);
        $sql->execute();

        return $sql;
    }

    // editar fotos de portada
    protected static function EditarFotoPortada($foto, $Id_fotoCompartida){

        $fecha_Foto = new DateTime();
        $nombreArchivoFotoPost = ($foto != '') ? $fecha_Foto->getTimestamp() . '_' . $_FILES['cover_photo']['name'] : "";
        $tmp_imgpost = $_FILES['cover_photo']['tmp_name'];
        if ($tmp_imgpost != '') {
            move_uploaded_file($tmp_imgpost, '../views/css/photos/' . $nombreArchivoFotoPost);
        }

        $conectar = MainModel::Conectar();
        $sql = $conectar->prepare("UPDATE `fotos_compartidas` SET `Foto` = :Foto WHERE `Id_Foto_Compartida` = :Id_ft");
        $sql->bindParam(":Id_ft", $Id_fotoCompartida);
        $sql->bindParam(":Foto", $nombreArchivoFotoPost);
        $sql->execute();

        return $sql;
    }


    //obtener el id del perfil
    protected static function obteneridperfil($id_user){
        $conectar = MainModel::Conectar();
        $sql = $conectar->prepare("SELECT `id_perfil`  FROM `perfil` WHERE id_user =:ID");
        $sql->bindParam(":ID",$id_user);
        $sql->execute();
        $idperfil = $sql->fetch(PDO::FETCH_ASSOC);

        return $idperfil;
    }

    //obtener el id del perfil
    protected static function obtenerIdFoto($id_perfil, $id_tipo){
        $conectar = MainModel::Conectar();
        $sql = $conectar->prepare("SELECT `Id_Foto_Compartida` FROM `fotos_compartidas` WHERE id_perfil =:Id_per AND Id_tipo_Foto = :Tipo");
        $sql->bindParam(":Id_per",$id_perfil);
        $sql->bindParam(":Tipo",$id_tipo);
        $sql->execute();
        $fotoIdpre = $sql->fetch(PDO::FETCH_ASSOC);
        $fotoId = $fotoIdpre['Id_Foto_Compartida'];

        return $fotoId;
    }


} 