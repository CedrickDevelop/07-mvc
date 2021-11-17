<?php

namespace App\Core;

class Router
{

  private $routes = []; 

  public function get($path, $callback){
      $this->routes['get'][$path] = $callback;
  }
}