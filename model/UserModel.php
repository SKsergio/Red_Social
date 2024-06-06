<?php
require_once './MainModel.php';

class UserModel extends MainModel{

    //creamos un modelo para agregar Usuario
    protected static function AgregarUsuario_Modelo($datos){
        $sql = MainModel::Conectar->prepare("INSERT INTO usuario(`user`,`password`,`correo`,`fecha_nacimiento`,`genero`,`telefono`,`apellido`,`Nombre_Real`) 
        VALUES(:USER, :PASS, :GMAIL, :FECHA, :GENERO, :PHONE, :LAST_NAME, :NOMBRE)");

        $sql->bindParam(":USER", $datos['usuario']);
        $sql->bindParam(":PASS", $datos['password']);
        $sql->bindParam(":GMAIL", $datos['correo']);
        $sql->bindParam(":FECHA", $datos['fecha']);
        $sql->bindParam(":GENERO", $datos['genero']);
        $sql->bindParam(":PHONE", $datos['usuario']);
        $sql->bindParam(":LAST_NAME", $datos['usuario']);
        $sql->bindParam(":NOMBRE", $datos['nombre']);

        $sql->exeute();

        return $sql;
    }
}