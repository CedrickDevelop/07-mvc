<?php

namespace App\Core;

use App\Core\Request;

class Router
{

  private $routes = []; 
  public Request $request;

  // On definit un constructeur pour initialiser la reponse
  public function __construct(Request $request){
    $this->request = $request;
  }

  // Definir quelle page ouvrir en fonction de l'url
  public function get($path, $callback){
      $this->routes['get'][$path] = $callback;
  }

  public function resolve()
  {

    // On cree la route pour y accéder
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    $callback = $this->routes[$method][$path] ?? false;

    // Si il n'y a pas de callback car la route ne correspond pas il ouvre la page 404
    if (!$callback) {
        echo "404 | Not Found";
        exit;
    }

    // On active la function du callback
    echo call_user_func($callback);
  }
}