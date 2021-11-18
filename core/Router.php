<?php

namespace App\Core;

use App\Core\Request;
use App\Controller\ContactManager;

class Router
{

  private $routes = [];
  public Request $request;

  // On definit un constructeur pour initialiser la reponse
  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  // Definir quelle page ouvrir en fonction de l'url
  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    $callback = $this->routes[$method][$path] ?? false;

    if (!$callback) {
      return "404 | Not Found";
    }

    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    return call_user_func($callback);
  }

  public function renderView($view)
  {
    include_once __DIR__ . '/../views/' . $view . '.php';
  }
}
