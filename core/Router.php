<?php

namespace App\Core;

use App\Core\Request;
use App\Controller\ContactManager;

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
    
    //appelle de la methode
    if (is_string($callback)){
      return $this->renderView($callback);
    }

    // On active la function du callback
    echo call_user_func($callback);

  }

  // Methode render qui renvoi la vue
  public function renderView($view)
  {
      $content = $this->renderContent($view);
      $layout = $this->renderLayout();

      return str_replace("{{ content }}", $content, $layout );
  }
  
  // Methode render pour le template
  public function renderContent($view)
  {
    ob_start();
    include_once __DIR__ . '/../views/'.$view.'.php';  
    return ob_get_clean();
  }
  
  // Methode render pour le layout
  public function renderLayout()
  {
    ob_start();
      include_once __DIR__ . '/../views/default.phtml'; 
    return ob_get_clean();
  }
}