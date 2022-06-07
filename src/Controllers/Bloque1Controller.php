<?php
namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Avance;
use App\Models\Cuestionario1;


class Bloque1Controller extends BaseController{

    private $mensaje = 'Por favor ingresa tu usuario y contraseña (es probable que tu sesión haya caducado por inactividad) - Si no eres alumno o profesor del CCH, ingresa como invitado.';

    public function bloques($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        return $this->view->render($response,'/bloques.twig');
    }
    public function bloque1($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }
        return $this->view->render($response,'/bloques/bloque1/portada.twig');
    }
    public function el_cch($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b1_01');
        }

        return $this->view->render($response,'/bloques/bloque1/b1_01.twig');
    }
    public function modelo_educativo($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }
        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b1_02');
        }

        return $this->view->render($response,'/bloques/bloque1/b1_02.twig');
    }
    public function asignaturas($request, $response){
        if(!$this->auth->check()){
           $this->flash->addMessage('error', $this->mensaje);
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b1_03');
        }

        return $this->view->render($response,'/bloques/bloque1/b1_03.twig');
    }

    public function cuestionario_1($request, $response){
        $data = $request->getParsedBody();

        $p1 = $data['p1'];
        $p2 = $data['p2'];
        $p3 = $data['p3'];

        if(!$this->auth->is_guest()){
            Cuestionario1::guardaRespuestas($this->session->id, $p1, $p2, $p3);
            $this->flash->addMessage('exito', "Las respuestas han sido guardadas con exito");
        }else{
            $this->flash->addMessage('advertencia', "Eres un usuario Anonimo, por lo cual tus respuestas no se registran");
        }

        return $response->withHeader('Location', $this->router->urlFor('asignaturas-areas'));
    }
}
