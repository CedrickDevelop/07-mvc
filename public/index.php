<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'accueil');
$app->router->get('/accueil', 'accueil');
$app->router->get('/contact', 'contact');

$app->run();
