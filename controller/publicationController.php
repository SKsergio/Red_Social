<?php

require_once __DIR__ . '/../model/PublicationModel.php';

class publicationController extends PublicationModel{
    //pasar datos a publucacion
    public function SetearDatosPublication($Datos, $id){
        $Mensaje = isset($Datos['mensaje']) ? $Datos['mensaje'] : '';
        $foto = isset($Datos['photo']) ? $Datos['photo'] : null;
        $tipo = 'PublicationPhoto';

        //obtenemos el id del perfil
        $obtenerid = PublicationModel::ObteneridPerfil($id);

        //creamos el post
        $insertarPost = PublicationModel::crearPublication($Mensaje, $obtenerid);

        //insertamos la foto
        $insertarFoto = PublicationModel::SubirFoto($obtenerid, $tipo, $foto);
        
        //editamos la publicacion para agregar el id de la foto
        $PutPhotowithPost = PublicationModel::AgregarfotoAPost($insertarFoto,$insertarPost);

        return $PutPhotowithPost;
    }
}