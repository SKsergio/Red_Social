<?php

require_once __DIR__ . '/../model/MostrarFotosModel.php';

class MostarFotosController extends MostarFotosModel {
    public function ObtenerFotos($Nombre) {
        $fotoPerfil = MostarFotosModel::ObtenerFotoPerfil($Nombre);
        $fotoPortada = MostarFotosModel::ObtenerFotoPortada($Nombre);

        return [$fotoPerfil, $fotoPortada];
    }

    //obtener id del perfil
    public function ObtIdProfile($id_User){
        $id = MostarFotosModel::obteneridperfil($id_User);
        return $id;
    }

    public function GestionarFotos($Datos){
        $Id_perfil = isset($Datos['id_perfil']) ? $Datos['id_perfil']:"";
        $NewFoto_Perfil = isset($Datos['perfil_picture']) ? $Datos['perfil_picture'] : null;
        $NewFoto_Portada = isset($Datos['cover_photo']) ? $Datos['cover_photo'] : null;
        $Tipos = ['ProfilePhoto','CoverPhoto'];

        //ESTE ES EL ID DE LA FOTO DE PERFIL
        $id_foto_perfil = MostarFotosModel::obtenerIdFoto($Id_perfil,$Tipos[0]);
        //ESTE ES EL ID DE LA FOTO DE PORTADA
        $id_foto_portada = MostarFotosModel::obtenerIdFoto($Id_prfil,$Tipos[1]);
        




    }

}
