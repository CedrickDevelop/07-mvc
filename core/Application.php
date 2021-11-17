<?php

namespace App\Core;

use App\Core\Router;

class Application
{
    public Router $router;
    public Request $request;

    // On appelle le router pour connaitre les pages
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }
}