<?php
namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Avance;

class Bloque3Controller extends BaseController{

    private $mensaje = 'Por favor ingresa tu usuario y contraseña (es probable que tu sesión haya caducado por inactividad) - Si no eres alumno o profesor del CCH, ingresa como invitado.';

    public function area_ciencias_experimentales($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b3_01');
        }

        return $this->view->render($response,'/bloques/bloque3/b3_01.twig');
    }

    public function area_matematicas ($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b3_02');
        }

        return $this->view->render($response,'/bloques/bloque3/b3_02.twig');
    }

    public function area_talleres($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b3_03');
        }

        return $this->view->render($response,'/bloques/bloque3/b3_03.twig');
    }

    public function area_historico_social($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b3_04');
        }

        return $this->view->render($response,'/bloques/bloque3/b3_04.twig');
    }

    public function area_idiomas($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b3_05');
        }

        return $this->view->render($response,'/bloques/bloque3/b3_05.twig');
    }
}
