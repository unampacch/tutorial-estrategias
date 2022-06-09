<?php
namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Avance;

class Bloque2Controller extends BaseController{

    private $mensaje = 'Por favor ingresa tu usuario y contraseña (es probable que tu sesión haya caducado por inactividad) - Si no eres alumno o profesor del CCH, ingresa como invitado.';

    public function bloque2($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }
        return $this->view->render($response,'/bloques/bloque2/b2_index.twig');
    }

    public function aprender($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_01');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_01.twig');
    }

    public function estilos_de_aprendizaje($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_02');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_02.twig');
    }

    public function cuestionatio_honey_alonso($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_03');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_03.twig');
    }

    public function estrategias_de_aprendizaje($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_04');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_04.twig');
    }

    public function tecnicas_de_estudio($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_05');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_05.twig');
    }

    public function busqueda_de_informacion($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_06');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_06.twig');
    }

    public function lectura($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_07');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_07.twig');
    }

    public function escritura($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_08');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_08.twig');
    }

    public function organizadores_graficos($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_09');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_09.twig');
    }

    public function habitos_de_estudio($request, $response){
        if(!$this->auth->check()){
            $this->flash->addMessage('error', $this->mensaje);
            return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b2_10');
        }

        return $this->view->render($response,'/bloques/bloque2/b2_10.twig');
    }
}
