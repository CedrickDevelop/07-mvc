<?php

namespace App\Core;

use App\Core\Request;

class Router
{

  private $routes = []; 
  public Request $request;

  // On definit un constructeur pour initialiser la reponse
  public function __construct(Request $request){
    $this->request = new Request();
  }

  // Definir quelle page ouvrir en fonction de l'url
  public function get($path, $callback){
      $this->routes['get'][$path] = $callback;
  }

  public function resolve()
  {
    $this->request->getPath();
  }
}