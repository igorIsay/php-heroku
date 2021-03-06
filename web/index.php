<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
// $app->register(new Silex\Provider\TwigServiceProvider(), array(
//     'twig.path' => __DIR__.'/views',
// ));

// Our web handlers

$app->get('/', function() use($app) {
    $app['monolog']->info(var_export($_COOKIE, true));
    $app['monolog']->info(var_export($_GET, true));
    return 'TEST';
});

$app->post('/', function() use($app) {
    $app['monolog']->info(var_export($_COOKIE, true));
    $app['monolog']->info(var_export($_GET, true));
    return 'TEST';
});

$app->run();
