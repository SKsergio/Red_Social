<?php 

require_once __DIR__ . '/MainModel.php';

class ShowPostsModel extends MainModel{
    //funcion para recuperar
    protected static function ObtenerPosts(){
        $conectar = MainModel::Conectar();
        $consultar = $conectar->prepare("SELECT * FROM `vistadatospublicaciones`");
        $consultar->execute();
        $Posts = $consultar->fetchAll(PDO::FETCH_ASSOC);

        return $Posts;
    }

    //recuperar todos los post de un solo perfil
    protected static function SetPostOnlyProfile($Nombre){
        $conectar = MainModel::Conectar();
        $consultar = $conectar->prepare("SELECT * FROM `vistadatospublicaciones` WHERE Nombre = :Nombre");
        $consultar->bindParam(":Nombre",$Nombre);
        $consultar->execute();
        $Posts = $consultar->fetchAll(PDO::FETCH_ASSOC);

        return $Posts;
    }

}