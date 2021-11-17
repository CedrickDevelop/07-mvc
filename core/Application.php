<?php

namespace App\Core;

    class Application
    {
        public Router $router;

        // On appelle le router pour connaitre les pages
        public function __construct()
        {
            $this->router = new Router();
        }
    }