<?php

require_once __DIR__.'vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->router->get('/', function() {
    return "hello world !";
});

$app->router->get('/contact', function() {
    return "contact page !";
});

$app->run();

echo "Hello";



?>