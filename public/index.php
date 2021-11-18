<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Application;

$app = new Application();

// Enregistrement des routes dans le tableau route
$app->router->get('/', function() {
    return "hello world !";
});


$app->router->get('/contact','contact');
$app->router->get('/accueil','home');

$app->run();





?>