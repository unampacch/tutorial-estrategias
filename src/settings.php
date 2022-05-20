<?php
$container->set('settings', function () {
    return [
        'displayErrorDetails' => true, //poner false en produccion
        'LogErrorDetails' => true,
        'logErrors' => true,
        'app' => [
            'name' => getenv('APP_NAME')
        ],
        'views' => [
            'path' => __DIR__ .'/Templates',
            'settings' => [
              #  'cache'=> true,
              #  'cache' => __DIR__ . '/../cache', //Activar en produccion
            ],
        ],
        'session' => [
        // session cookie settings
            'name' => 'tea_session',
            'autorefresh' => true,
            'lifetime' => '1 hour',
        ],
    ];
});
