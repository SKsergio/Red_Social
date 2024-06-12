<?php

require_once __DIR__ . '/../model/ShowPostsModel.php';

class ShowPostsController extends ShowPostsModel{

    public function EnviarArrayPost(){

        $ArrayDatos = ShowPostsModel::ObtenerPosts();

        return $ArrayDatos;
    }

    public function PosforOneProfile($Nombre){

        $ArrayPost = ShowPostsModel::SetPostOnlyProfile($Nombre);

        return $ArrayPost;

    }
}
