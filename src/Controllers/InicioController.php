<?php
namespace App\Controllers;

use App\Models\Usuarios;

class InicioController extends BaseController{
    public function home($request, $response){
        return $this->view->render($response,'home.twig');
    }
    public function end($request, $response){
        return $this->view->render($response,'/sections/final.twig');
    }
    public function prueba1($request, $response){
        return $this->view->render($response,'prueba1.twig');
    }
    public function prueba2($request, $response){
        return $this->view->render($response,'prueba2.twig');
    }
}
