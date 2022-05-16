<?php
namespace App\Controllers;

use App\Models\Usuarios;

class SeccionesController extends BaseController{

    private $mensaje = 'Por favor ingresa tu usuario y contraseña (es probable que tu sesión haya caducado por inactividad) - Si no eres alumno o profesor del CCH, ingresa como invitado.';

    public function creditos($request, $response){

        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        return $this->view->render($response,'/libres/creditos.twig');
    }
    public function directorio($request, $response){

        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        return $this->view->render($response,'/libres/directorio.twig');
    }
    public function bibliografia($request, $response){

        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        return $this->view->render($response,'/libres/bibliografia.twig');
    }
    public function aviso_legal($request, $response){

        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        return $this->view->render($response,'/libres/aviso-legal.twig');
    }
    public function ayuda($request, $response){

        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        return $this->view->render($response,'/libres/ayuda.twig');
    }
}
