<?php
namespace App\Controllers;

use App\Models\Usuarios;
use App\Models\Avance;
use App\Models\Cuestionario_b1_03;
use App\Models\Cuestionario_b2_01;
use App\Models\Cuestionario_b2_03;
use App\Models\Cuestionario_b2_04;
use App\Models\Cuestionario_b2_06_1;
use App\Models\Cuestionario_b2_06_2;
use App\Models\Cuestionario_b2_06_3;
use App\Models\Cuestionario_b2_10;


class CuestionariosController extends BaseController{

    public function cuestionario_b1_03($request, $response){
        $data = $request->getParsedBody();

        $p1 = $data['p1'];
        $p2 = $data['p2'];
        $p3 = $data['p3'];


        if(!$this->auth->is_guest()){
            Cuestionario_b1_03::guardaRespuestas($this->session->id, $p1, $p2, $p3);
            $this->flash->addMessage('exito', "Las respuestas han sido guardadas con exito");
        }else{
            $this->flash->addMessage('advertencia', "Eres un usuario Anonimo, por lo cual tus respuestas no se registran");
        }

        return $response->withHeader('Location', $this->router->urlFor('asignaturas-areas'));
    }
    public function cuestionario_b1_03_put($request, $response){

        $form_data = $request->getParsedBody();

        $p1 = $form_data['p1'];
        $p2 = $form_data['p2'];
        $p3 = $form_data['p3'];
        $data['respuesta'] = 'error';
        $data['p1'] = $p1;
        $data['p2'] = $p2;
        $data['p3'] = $p3;


        //$payload = json_encode($data);



        if(!$this->auth->is_guest()){
            Cuestionario_b1_03::guardaRespuestas($this->session->id, $p1, $p2, $p3);
            $data['respuesta'] = 'exito';
            $response->getBody()->write(json_encode($data));
            return $response->withHeader('Content-type', 'application/json')->withStatus(201);
        }else{
            $response->getBody()->write(json_encode($data));
            return $response->withHeader('Content-type', 'application/json')->withStatus(203);
        }

        //return $response->withHeader('Location', $this->router->urlFor('asignaturas-areas'));
    }

    public function cuestionario_b2_01($request, $response){
        $data = $request->getParsedBody();

        $p1 = $data['p1'];
        $p2 = $data['p2'];


        if(!$this->auth->is_guest()){
            Cuestionario_b2_01::guardaRespuestas($this->session->id, $p1, $p2);
            $this->flash->addMessage('exito', "Tus respuestas han sido enviadas con ??xito.");
        }else{
            $this->flash->addMessage('advertencia', "Eres un usuario Anonimo, por lo cual tus respuestas no se registran");
        }

        return $response->withHeader('Location', $this->router->urlFor('aprender'));
    }

    public function cuestionario_b2_03($request, $response){
        $datos = $request->getParsedBody();

        $calculo=$this->calcula_honey($datos);


        if(!$this->auth->is_guest()){
            Cuestionario_b2_03::guardaRespuestas($this->session->id, $datos, $calculo);
            $this->flash->addMessage('exito', "Tus respuestas han sido enviadas con ??xito. Puedes consultar tus resultados en las siguientes graficas.");
        }else{
            $this->flash->addMessage('advertencia', "Eres un usuario Anonimo, por lo cual tus respuestas no se registran");
        }

        return $response->withHeader('Location', $this->router->urlFor('honey-alonso'));
    }

    public function cuestionario_b2_03_put($request, $response){
        $datos = $request->getParsedBody();

        $calculo=$this->calcula_honey($datos);


        if(!$this->auth->is_guest()){
            Cuestionario_b2_03::guardaRespuestas($this->session->id, $datos, $calculo);
            return $response->withJson(['success' => true]);
        }else{
            return $response->withJson(['fail' => true]);
        }

    }

    public function cuestionario_b2_04($request, $response){
        $data = $request->getParsedBody();

        $p1 = $data['p1'];
        $p2 = $data['p2'];


        if(!$this->auth->is_guest()){
            Cuestionario_b2_04::guardaRespuestas($this->session->id, $p1, $p2);
            $this->flash->addMessage('exito', "Tus respuestas han sido enviadas con ??xito, revisa la retroalimentaci??n que recibiste antes de ir a la siguiente pantalla");
        }else{
            $this->flash->addMessage('advertencia', "Eres un usuario Anonimo, por lo cual tus respuestas no se registran");
        }

        return $response->withHeader('Location', $this->router->urlFor('estrategias-aprendizaje'));
    }



    public function cuestionario_b2_06($request, $response){
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
        $p14 = $data['p14'];
        $p15 = $data['p15'];
        $p16 = $data['p16'];
        $nact = $data['nact'];
        $numcuest = $data['numcuest'];

        switch ($numcuest) {
            case 1:
                Cuestionario_b2_06_1::guardaRespuestas($this->session->id, $p1, $p2, str_replace(' ', '', $p3));
                $this->flash->addMessage('exito', 'Tus respuestas han sido enviadas. Revisa si lo hiciste correctamente, ve al ejercicio 1. "Biblioteca de tu plantel" y no olvides resolver los ejercicios 2 y 3.');
                break;
            case 2:
                Cuestionario_b2_06_2::guardaRespuestas($this->session->id, $p1, $p2, trim($p3));
                $this->flash->addMessage('exito', "Tus respuestas han sido enviadas. No olvides resolver los ejercicios 1 y 3. ");
                break;
            case 3:
                Cuestionario_b2_06_3::guardaRespuestas($this->session->id, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11,$p12, $p13, $p14, $p15, $p16);
                $this->flash->addMessage('exito', 'Tus respuestas han sido enviadas. Revisa si lo hiciste correctamente, ve al ejercicio 3. "Internet" y no olvides resolver los ejercicios 1 y 2. ');
                break;
        }


        return $response->withHeader('Location', $this->router->urlFor('busqueda-informacion'));
    }

    public function cuestionario_b2_10($request, $response){
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

        Cuestionario_b2_10::guardaRespuestas($this->session->id, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11);

        $this->flash->addMessage('exito', "Tus respuestas han sido enviadas con ??xito.");

        return $response->withHeader('Location', $this->router->urlFor('habitos-estudio'));
    }

    public function honey_alonso(){
        $preguntas =[
            1 => 'Tengo la costumbre de decir lo que pienso claramente y sin rodeos.',
            2 => 'Estoy seguro(a) de lo que es bueno y lo que es malo, lo que est?? bien y lo que est?? mal.',
            3 => 'Muchas veces act??o sin considerar las consecuencias.',
            4 => 'Normalmente trato de resolver los problemas ordenadamente y paso a paso.',
            5 => 'Creo que la formalidad limita la actuaci??n libre de las personas.',
            6 => 'Me interesa saber cu??les son los valores de los dem??s y los criterios con qu?? act??an.',
            7 => 'Pienso que guiarse por la intuici??n puede ser siempre tan adecuado como actuar reflexivamente.',
            8 => 'Creo que lo m??s importante es que las cosas funcionen.',
            9 => 'Procuro estar al pendiente de lo que ocurre aqu?? y ahora.',
            10 => 'Disfruto cuando tengo tiempo para preparar mi trabajo y realizarlo a conciencia.',
            11 => 'Estoy a gusto siguiendo un orden, en las comidas, en el estudio, haciendo ejercicio regularmente.',
            12 => 'Cuando escucho una nueva idea, enseguida comienzo a pensar c??mo ponerla en pr??ctica.',
            13 => 'Prefiero las ideas originales y novedosas aunque no sean pr??cticas.',
            14 => 'Admito y me ajusto a las normas s??lo si me sirven para lograr mis objetivos.',
            15 => 'Normalmente encajo bien con personas reflexivas, y me cuesta relacionarme con personas demasiado espont??neas, imprevisibles.',
            16 => 'Generalmente prefiero escuchar m??s que hablar.',
            17 => 'Prefiero las cosas estructuradas por encima de las desordenadas.',
            18 => 'Cuando poseo cualquier informaci??n, trato de interpretarla bien antes de sacar alguna conclusi??n.',
            19 => 'Antes de hacer algo reflexiono con cuidado acerca de sus ventajas y desventajas.',
            20 => 'Aprendo con el reto de hacer algo nuevo y diferente.',
            21 => 'Casi siempre procuro ser coherente con mis criterios y valores. Tengo principios y los sigo.',
            22 => 'Cuando hay una discusi??n  digo las cosas sin rodeos.',
            23 => 'No me agrada relacionarme afectivamente en mi ambiente de trabajo. Prefiero mantenerme  distante.',
            24 => 'Me gustan m??s las personas con enfoque realista y concreto en lugar de las personas con enfoque te??rico.',
            25 => 'Me cuesta ser creativo(a) y romper estructuras.',
            26 => 'Me siento a gusto con personas espont??neas y divertidas.',
            27 => 'La mayor??a de las veces expreso abiertamente c??mo me siento.',
            28 => 'Me gusta analizar y dar vueltas a las cosas.',
            29 => 'Me molesta que la gente no se tome en serio las cosas.',
            30 => 'Me atrae experimentar y practicar las ??ltimas t??cnicas y novedades.',
            31 => 'Soy cauteloso(a) a la hora de sacar conclusiones.',
            32 => 'Prefiero contar con el mayor n??mero de fuentes de informaci??n. Cuanto m??s datos se re??nan para reflexionar, mejor.',
            33 => 'Tiendo a ser perfeccionista.',
            34 => 'Prefiero escuchar las opiniones de los dem??s antes de exponer las m??as.',
            35 => 'Me gusta la espontaneidad y no tener que planificar todo previamente.',
            36 => 'En las discusiones me gusta observar c??mo act??an los dem??s participantes.',
            37 => 'Me siento inc??modo(a) con las personas calladas y demasiado anal??ticas.',
            38 => 'Juzgo con frecuencia las ideas de los dem??s por su valor pr??ctico.',
            39 => 'Me agobio si me obligan a acelerar mucho el trabajo para cumplir con un plazo.',
            40 => 'En las reuniones, apoyo las ideas pr??cticas y realistas.',
            41 => 'Es mejor gozar el presente que deleitarse pensando en el pasado o en el futuro.',
            42 => 'Me molestan las personas que siempre desean apresurar las cosas.',
            43 => 'Aporto ideas nuevas y espont??neas en los grupos de discusi??n.',
            44 => 'Pienso que son m??s consistentes las decisiones fundamentadas en un minucioso an??lisis que las basadas en la intuici??n.',
            45 => 'Detecto frecuentemente la inconsistencia y puntos d??biles en las argumentaciones de los dem??s.',
            46 => 'Creo que es preciso saltarse las normas muchas m??s veces que cumplirlas.',
            47 => 'Frecuentemente me doy cuenta de que hay otras formas mejores y m??s pr??cticas de hacer las cosas.',
            48 => 'Generalmente hablo m??s de lo que escucho.',
            49 => 'Prefiero alejarme de los hechos y observarlos desde otras perspectivas.',
            50 => 'Estoy convencido(a) que debe imponerse la l??gica y el razonamiento.',
            51 => 'Me gusta buscar nuevas experiencias.',
            52 => 'Me gusta experimentar y aplicar las cosas.',
            53 => 'Pienso que debemos llegar directamente al grano, al meollo de las cosas.',
            54 => 'Siempre trato de llegar a conclusiones e ideas claras.',
            55 => 'Prefiero discutir cuestiones concretas y no perder el tiempo con pl??ticas sin sentido.',
            56 => 'Me impaciento cuando me dan explicaciones irrelevantes e incoherentes.',
            57 => 'Compruebo antes si las cosas funcionan realmente.',
            58 => 'Hago varios borradores antes de la redacci??n definitiva de un trabajo.',
            59 => 'Soy consciente de que en las discusiones ayudo a mantener a los dem??s centrados en el tema, evitando divagaciones.',
            60 => 'Observo que, con frecuencia, soy uno(a) de los(a) m??s objetivos(as) y desapasionados(as) en las discusiones.',
            61 => 'Cuando algo va mal, le resto importancia e intento hacerlo mejor.',
            62 => 'Rechazo ideas originales y espont??neas si no las considero pr??cticas.',
            63 => 'Me gusta deliberar entre diversas alternativas antes tomar una decisi??n.',
            64 => 'Con frecuencia pienso en el futuro para preverlo.',
            65 => 'En los debates y discusiones prefiero desempe??ar un papel secundario antes que ser  el (la) l??der o el(la) que m??s participa.',
            66 => 'Me molestan las personas que no act??an con l??gica.',
            67 => 'Me resulta inc??modo tener que planificar y prever las cosas.',
            68 => 'Creo que el fin justifica los medios en muchos casos.',
            69 => 'Suelo reflexionar sobre los asuntos y problemas.',
            70 => 'Trabajar a conciencia me llena de satisfacci??n y orgullo.',
            71 => 'Ante los hechos trato de descubrir los principios y teor??as en que se basan.',
            72 => 'Con tal de conseguir el objetivo que pretendo, soy capaz de herir sentimientos ajenos.',
            73 => 'No me importa hacer todo lo necesario para que sea efectivo mi trabajo.',
            74 => 'Con frecuencia soy una de las personas que m??s anima las fiestas.',
            75 => 'Me aburro enseguida con el trabajo met??dico y minucioso.',
            76 => 'La gente a menudo cree que soy poco sensible a sus sentimientos.',
            77 => 'Suelo dejarme llevar por la intuici??n.',
            78 => 'Si trabajo en equipo procuro que se siga un m??todo y un orden.',
            79 => 'Usualmente me interesa averiguar lo que piensa la gente.',
            80 => 'Evito los temas subjetivos, ambiguos y poco claros.',
        ];

        return $preguntas;
    }

    private function calcula_honey($preguntas){
        extract($preguntas);

        $activo     = $p3+$p5+$p7+$p9+$p13+$p20+$p26+$p27+$p35+$p37+$p41+$p43+$p46+$p48+$p51+$p61+$p67+$p74+$p75+$p77;
        $reflexivo  = $p10+$p16+$p18+$p19+$p28+$p31+$p32+$p34+$p36+$p39+$p42+$p44+$p49+$p55+$p58+$p63+$p65+$p69+$p70+$p79;
        $teorico    = $p2+$p4+$p6+$p11+$p15+$p17+$p21+$p23+$p25+$p29+$p33+$p45+$p50+$p54+$p60+$p64+$p66+$p71+$p78+$p80;
        $pragmatico = $p1+$p8+$p12+$p14+$p22+$p24+$p30+$p38+$p40+$p47+$p52+$p53+$p56+$p57+$p59+$p62+$p68+$p72+$p73+$p76;
        $total      = $activo+$reflexivo+$teorico+$pragmatico;

        $porciento_activo     = sprintf("%.3f",($activo/$total)*100);
        $porciento_reflexivo  = sprintf("%.3f",($reflexivo/$total)*100);
        $porciento_teorico    = sprintf("%.3f",($teorico/$total)*100);
        $porciento_pragmatico = sprintf("%.3f",($pragmatico/$total)*100);

        return [
            'activo' => $porciento_activo,
            'reflexivo' => $porciento_reflexivo,
            'teorico' => $porciento_teorico,
            'pragmatico' => $porciento_pragmatico
        ];
    }
}
