<?php

namespace App\Core;

use App\Core\Router;

class Application
{
    public Router $router;
    public Request $request;

    /**
     * Application constructeur
     * @return void
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    /**
     * Affichage de la vue
     * @return void
     */
    public function run()
    {
       echo $this->router->resolve();
    }
}