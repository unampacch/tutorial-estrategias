<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;
use Selective\BasePath\BasePathDetector;
use Selective\BasePath\BasePathMiddleware;

//session_start();

require __DIR__ . '/../vendor/autoload.php';

try {
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
	//
}

// Instantiate PHP-DI ContainerBuilder
$container = new Container();

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

$app = AppFactory::create();

$responseFactory = $app->getResponseFactory();

$routeCollector = $app->getRouteCollector();
$routeCollector->setDefaultInvocationStrategy(new RequestResponseArgs());
$routeParser = $app->getRouteCollector()->getRouteParser();


require __DIR__ . '/settings.php';

require __DIR__ . '/database.php';

require __DIR__ . '/dependencies.php';

require __DIR__ . '/middleware.php';

require __DIR__ . '/routes.php';
