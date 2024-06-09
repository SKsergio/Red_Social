<?php

require_once __DIR__ . '/../model/MostrarFotosModel.php';

class MostarFotosController extends MostarFotosModel {
    public function ObtenerFotos($Nombre) {
        $fotoPerfil = MostarFotosModel::ObtenerFotoPerfil($Nombre);
        $fotoPortada = MostarFotosModel::ObtenerFotoPortada($Nombre);

        return [$fotoPerfil, $fotoPortada];
    }
}
