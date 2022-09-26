<?php
namespace App\Controllers;

use App\Models\Cuestionario_opinion;
use App\Models\Avance;

class OpinionController extends BaseController{

    public function show($request, $response){

        if(!$this->auth->check()){
           $this->flash->addMessage('error', 'Por favor ingresa tu usuario y contraseña (es probable que tu sesión haya caducado por inactividad) - Si no eres alumno o profesor del CCH, ingresa como invitado.');
           return $response->withHeader('Location', $this->router->urlFor('home'));
        }

        if(!$this->auth->is_guest()){
            Avance::registra($this->session->id, 'b5_00');
        }
        return $this->view->render($response,'opinion.twig');
    }

    public function guardar($request, $response){
        $data = $request->getParsedBody();

        $p1 = $data['p1'];
        $p2 = $data['p2'];
        $p3 = $data['p3'];
        $p4 = $data['p4'];
        $p5 = $data['p5'];
        $p6 = $data['p6'];
        $p7 = $data['p7'];
        $p8 = $data['p8'];
        $p9 = $data['p9'];
        $p10 = $data['p10'];
        $p11 = $data['p11'];
        $p12 = $data['p12'];
        $p13 = $data['p13'];

        Cuestionario_opinion::guardaRespuestas($this->session->id, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13);
        Avance::registra_opinion($this->session->id);

        $this->flash->addMessage('exito', "Tus respuestas han sido enviadas con éxito.");

        return $response->withHeader('Location', $this->router->urlFor('opinion'));
    }
}
