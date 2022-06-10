<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollector;
use Slim\Routing\RouteCollectorProxy;
use App\Controllers\InicioController;
use App\Controllers\Bloque1Controller;
use App\Controllers\Bloque2Controller;
use App\Controllers\Bloque3Controller;
use App\Controllers\Bloque4Controller;
use App\Controllers\SeccionesController;
use App\Controllers\CuestionariosController;
use App\Controllers\OpinionController;
use App\Controllers\Auth\AuthController;



$app->get('/', InicioController::class.':home')->setName('home');

$app->post('/entrar', AuthController::class.':postSignIn');
$app->get('/entrar', AuthController::class.':getSignIn');
$app->get('/salir', AuthController::class.':getSignOut');




$app->get('/prueba1', InicioController::class.':prueba1');
$app->get('/prueba2', InicioController::class.':prueba2');

$app->get('/aviso-legal', SeccionesController::class.':aviso_legal');
$app->get('/bibliografia', SeccionesController::class.':bibliografia');
$app->get('/creditos', SeccionesController::class.':creditos');
$app->get('/ayuda', SeccionesController::class.':ayuda');
$app->get('/directorio', SeccionesController::class.':directorio');
$app->get('/cuestionario', OpinionController::class.':show')->setName('opinion');
$app->post('/cuestionario', OpinionController::class.':guardar');

$app->get('/bloques', Bloque1Controller::class.':bloques')->setName('bloques');
$app->group('/bloques/el-cch', function (RouteCollectorProxy $group) {
    $group->get('', Bloque1Controller::class.':bloque1');
    $group->get('/que-es-el-cch', Bloque1Controller::class.':el_cch');
    $group->get('/modelo-educativo', Bloque1Controller::class.':modelo_educativo');
    $group->get('/asignaturas-areas', Bloque1Controller::class.':asignaturas')->setName('asignaturas-areas');
    $group->post('/asignaturas-areas', CuestionariosController::class.':cuestionario_b1_03');
});

$app->group('/bloques/aprender', function (RouteCollectorProxy $group) {
    $group->get('', Bloque2Controller::class.':bloque2');
    $group->get('/que-es-aprender', Bloque2Controller::class.':aprender')->setName('aprender');
    $group->post('/que-es-aprender', CuestionariosController::class.':cuestionario_b2_01');
    $group->get('/estilos-de-aprendizaje', Bloque2Controller::class.':estilos_de_aprendizaje');
    $group->get('/cuestionario-honey-alonso', Bloque2Controller::class.':cuestionatio_honey_alonso')->setName('honey-alonso');
    $group->post('/cuestionario-honey-alonso', CuestionariosController::class.':cuestionario_b2_03');
    $group->put('/cuestionario-honey-alonso', CuestionariosController::class.':cuestionario_b2_03_put');
    $group->get('/estrategias-de-aprendizaje', Bloque2Controller::class.':estrategias_de_aprendizaje')->setName('estrategias-aprendizaje');
    $group->post('/estrategias-de-aprendizaje', CuestionariosController::class.':cuestionario_b2_04');
    $group->get('/tecnicas-de-estudio', Bloque2Controller::class.':tecnicas_de_estudio');
    $group->get('/busqueda-de-informacion', Bloque2Controller::class.':busqueda_de_informacion')->setName('busqueda-informacion');
    $group->post('/busqueda-de-informacion', CuestionariosController::class.':cuestionario_b2_06');
    $group->get('/lectura', Bloque2Controller::class.':lectura');
    $group->get('/escritura', Bloque2Controller::class.':escritura');
    $group->get('/organizadores-graficos', Bloque2Controller::class.':organizadores_graficos');
    $group->get('/habitos-de-estudio', Bloque2Controller::class.':habitos_de_estudio')->setName('habitos-estudio');
    $group->post('/habitos-de-estudio', CuestionariosController::class.':cuestionario_b2_10');
});

$app->group('/bloques/recursos', function (RouteCollectorProxy $group) {
    $group->get('', Bloque3Controller::class.':bloque3');
    $group->get('/ciencias-experimentales', Bloque3Controller::class.':area_ciencias_experimentales');
    $group->get('/matematicas', Bloque3Controller::class.':area_matematicas');
    $group->get('/talleres', Bloque3Controller::class.':area_talleres');
    $group->get('/historico-social', Bloque3Controller::class.':area_historico_social');
    $group->get('/idiomas', Bloque3Controller::class.':area_idiomas');
});

$app->group('/bloques/tic-aprender', function (RouteCollectorProxy $group) {
    $group->get('', Bloque4Controller::class.':bloque4');
    $group->get('/que-son-las-tic', Bloque4Controller::class.':las_tic');
    $group->get('/almacenar-informacion', Bloque4Controller::class.':almacenar_informacion');
    $group->get('/trabajo-colaborativo', Bloque4Controller::class.':trabajo_colaborativo');
});

/*
$app->get('/bloques', Bloque1Controller::class.':bloques')->setName('bloques');
$app->group('/bloque1', function (RouteCollectorProxy $group) {
    $group->get('/el-cch', Bloque1Controller::class.':el_cch');
    $group->get('/modelo-educativo', Bloque1Controller::class.':modelo_educativo');
    $group->get('/asignaturas-areas', Bloque1Controller::class.':asignaturas')->setName('asignaturas-areas');
    $group->post('/asignaturas-areas', CuestionariosController::class.':cuestionario_b1_03');
});

$app->group('/bloque2', function (RouteCollectorProxy $group) {
    $group->get('/aprender', Bloque2Controller::class.':aprender')->setName('aprender');
    $group->post('/aprender', CuestionariosController::class.':cuestionario_b2_01');
    $group->get('/estilos-de-aprendizaje', Bloque2Controller::class.':estilos_de_aprendizaje');
    $group->get('/cuestionatio-honey-alonso', Bloque2Controller::class.':cuestionatio_honey_alonso')->setName('honey-alonso');
    $group->post('/cuestionatio-honey-alonso', CuestionariosController::class.':cuestionario_b2_03');
    $group->get('/estrategias-de-aprendizaje', Bloque2Controller::class.':estrategias_de_aprendizaje')->setName('estrategias-aprendizaje');
    $group->post('/estrategias-de-aprendizaje', CuestionariosController::class.':cuestionario_b2_04');
    $group->get('/tecnicas-de-estudio', Bloque2Controller::class.':tecnicas_de_estudio');
    $group->get('/busqueda-de-informacion', Bloque2Controller::class.':busqueda_de_informacion')->setName('busqueda-informacion');
    $group->post('/busqueda-de-informacion', CuestionariosController::class.':cuestionario_b2_06');
    $group->get('/lectura', Bloque2Controller::class.':lectura');
    $group->get('/escritura', Bloque2Controller::class.':escritura');
    $group->get('/organizadores-graficos', Bloque2Controller::class.':organizadores_graficos');
    $group->get('/habitos-de-estudio', Bloque2Controller::class.':habitos_de_estudio')->setName('habitos-estudio');
    $group->post('/habitos-de-estudio', CuestionariosController::class.':cuestionario_b2_10');
});

$app->group('/bloque3', function (RouteCollectorProxy $group) {
    $group->get('/area-ciencias-experimentales', Bloque3Controller::class.':area_ciencias_experimentales');
    $group->get('/area-matematicas', Bloque3Controller::class.':area_matematicas');
    $group->get('/area-talleres', Bloque3Controller::class.':area_talleres');
    $group->get('/area-historico-social', Bloque3Controller::class.':area_historico_social');
    $group->get('/area-idiomas', Bloque3Controller::class.':area_idiomas');
});

$app->group('/bloque4', function (RouteCollectorProxy $group) {
    $group->get('/las-tic', Bloque4Controller::class.':las_tic');
    $group->get('/almacenar-informacion', Bloque4Controller::class.':almacenar_informacion');
    $group->get('/trabajo-colaborativo', Bloque4Controller::class.':trabajo_colaborativo');
});
*/
