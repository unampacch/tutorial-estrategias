<?php
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Views\TwigRuntimeLoader;
use Slim\Views\TwigMiddleware;
use Slim\Psr7\Factory\UriFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;
use App\Models\Usuarios;
use App\Models\Cuestionario_b1_03;
use App\Models\Cuestionario_b2_01;
use App\Models\Cuestionario_b2_03;
use App\Models\Cuestionario_b2_04;
use App\Models\Cuestionario_b2_06_1;
use App\Models\Cuestionario_b2_06_2;
use App\Models\Cuestionario_b2_06_3;
use App\Models\Cuestionario_b2_10;
use App\Models\Cuestionario_opinion;
use App\Controllers\CuestionariosController;


$container->set('db', function () use ($capsule) {
	return $capsule;
});

$container->set('router', function () use ($routeParser) {
    return $routeParser;
});

$container->set('session', function () {
  return new \SlimSession\Helper();
});

$container->set('auth', function () {
	return new \App\Auth\Auth;
});

$container->set('edb', function () {
	return new \App\ExternDB\ExternDB;
});

$container->set('flash', function() {
	return new \Slim\Flash\Messages;
});

$container->set('view', function ($container) use ($app) {

    $setting = $app->getContainer()->get('settings');
    $view = Twig::create($setting['views']['path'], $setting['views']['settings']);

    $runtimeLoader = new TwigRuntimeLoader(
        $app->getRouteCollector()->getRouteParser(),
        (new UriFactory)->createFromGlobals($_SERVER),
        '/'
    );

    $view->addRuntimeLoader($runtimeLoader);

    $view->addExtension(new TwigExtension(
        $app->getRouteCollector()->getRouteParser(),
        $app->getBasePath()
    ));

    $view->getEnvironment()->addGlobal('flash', $container->get('flash'));
    $view->getEnvironment()->addGlobal('usuario',Usuarios::findById($container->get('session')->id));
    $view->getEnvironment()->addGlobal('cuestionario1',Cuestionario_b1_03::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('cuestionario2',Cuestionario_b2_01::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('preguntas_honey_alonso',CuestionariosController::honey_alonso());
    $view->getEnvironment()->addGlobal('cuestionario3',Cuestionario_b2_03::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('cuestionario4',Cuestionario_b2_04::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('cuestionario5',Cuestionario_b2_06_1::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('cuestionario6',Cuestionario_b2_06_2::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('cuestionario7',Cuestionario_b2_06_3::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('cuestionario8',Cuestionario_b2_10::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('opinion',Cuestionario_opinion::revisa($container->get('session')->id));
    $view->getEnvironment()->addGlobal('retro_b6_1',Cuestionario_b2_06_1::retro($container->get('session')->id));

	return $view;
});
