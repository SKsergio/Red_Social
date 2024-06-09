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
} 