<?php

require_once __DIR__ . '/MainModel.php';

class LoginModel extends MainModel{
    //creamos el modelo para iniciar sesion
    protected static function IniciarSesionModelo($datos){
        $sql = MainModel::Conectar()->prepare("SELECT * FROM `usuario` WHERE `user` = :USUARIO AND `password` =:PASS");
        $sql->bindParam(":USUARIO",$datos['user_login']);
        $sql->bindParam(":PASS", $datos['password_login']);
        $sql->execute();
        
        return $sql;

    }
}
