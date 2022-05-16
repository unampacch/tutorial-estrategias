<?php
use Selective\BasePath\BasePathMiddleware;

$setting = $app->getContainer()->get('settings');

$app->addErrorMiddleware(
    $setting['displayErrorDetails'],
    $setting['LogErrorDetails'],
    $setting['logErrors']
);

$app->add( new \Slim\Middleware\Session($setting['session']));
