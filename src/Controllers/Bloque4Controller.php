<?php
namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Avance;

class Bloque4Controller extends BaseController{

    private $mensaje = 'Por favor ingresa tu usuario y contraseña (es probable que tu sesión haya caducado por inactividad) - Si no eres alumno o profesor del CCH, ingresa como invitado.';

    public function bloque4($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }
        return $this->view->render($response,'/bloques/bloque4/b4_index.twig');
    }

    public function las_tic($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b4_01');
        }

        return $this->view->render($response,'/bloques/bloque4/b4_01.twig');
    }
    public function almacenar_informacion($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b4_02');
        }

        return $this->view->render($response,'/bloques/bloque4/b4_02.twig');
    }
    public function trabajo_colaborativo($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b4_03');
        }

        return $this->view->render($response,'/bloques/bloque4/b4_03.twig');
    }
}
