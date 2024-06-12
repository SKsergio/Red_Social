<?php 

require_once __DIR__ . '/MainModel.php';

class PublicationModel extends MainModel{

    // funcion para obetner el id de perfil
    protected static function ObteneridPerfil($id_user){
        $conexion = MainModel::Conectar();
        $sql = $conexion->prepare("SELECT ID_PERFIL FROM usuariosperdil WHERE ID_USER = :ID_USER");
        $sql->bindParam(":ID_USER",$id_user);
        $sql->execute();
        $extraccion = $sql->fetch(PDO::FETCH_ASSOC);
        $Id_perfil = $extraccion['ID_PERFIL'];

        return $Id_perfil;
    }

    //funcion para subir fotos
    protected static function SubirFoto($Id, $Tipo, $foto){
        $conexion = MainModel::Conectar();
        
        $fecha_Foto = new DateTime();
        $nombreArchivoFotoPost = ($foto!='')?$fecha_Foto->getTimestamp().'_'.$_FILES['photo']['name']:"";
        $tmp_imgpost=$_FILES['photo']['tmp_name'];
        if ($tmp_imgpost!= '') {
            move_uploaded_file($tmp_imgpost,'../views/css/photos/'.$nombreArchivoFotoPost);
        }

        $sql = $conexion->prepare("INSERT INTO fotos_compartidas(`Id_tipo_Foto`, `Foto`, `id_perfil`) VALUES (:TIPO, :FOTO, :ID_PERFIL)");
        
        $sql->bindParam(":TIPO",$Tipo);
        $sql->bindParam(":FOTO",$nombreArchivoFotoPost);
        $sql->bindParam(":ID_PERFIL",$Id);
        $sql->execute();

        $lastInsertIdPhoto = $conexion->lastInsertId();

        return $lastInsertIdPhoto;
    }

    //funcion para crear publicacion
    protected static function crearPublication($mensaje,$id){
        $conexion = MainModel::Conectar();
        $sql = $conexion->prepare("INSERT INTO `publicaciones`(`mensaje`, `id_perfil`) VALUES (:Mensaje, :id_perfil)");
        $sql->bindParam(":Mensaje",$mensaje);
        $sql->bindParam(":id_perfil",$id);
        $sql->execute();

        $lastInsertIdPost = $conexion->lastInsertId();
        return $lastInsertIdPost;
    }

    //editamos la tabla de publicaciones para agregar la foto(espero funcione :/)
    protected static function AgregarfotoAPost($id_foto,$id_post){
        $conectar = MainModel::Conectar();
        $sql = $conectar->prepare("UPDATE `publicaciones` SET `Id_Foto`=:ID_FOTO WHERE Id_publicacion = :ID_POST");
        $sql->bindParam(":ID_FOTO",$id_foto);
        $sql->bindParam(":ID_POST",$id_post);
        $sql->execute();

        $ver = true;

        return $ver;
    }

    //finalmente agregamos a la tabla de relacion
    protected static function MergeTables($id_publicacion, $id_foto){
        $conectar = MainModel::Conectar();
        $sql = $conectar->prepare("INSERT INTO `fotos_publicaciones`(`Id_Foto_Compartida`, `Id_publicacion`) VALUES (:ID_FOTO, :ID_PUBLICACION)");
        $sql->bindParam(":ID_FOTO",$id_foto);
        $sql->bindParam(":ID_PUBLICACION",$id_publicacion);
        $sql->execute();

        return $sql;
    }
}