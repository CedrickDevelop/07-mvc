<?php

namespace App\Core;

use App\Core\Request;
use App\Controller\ContactManager;

class Router
{

  private $routes = []; 
  public Request $request;

  /**
   * @param Request $request
   * @return void
   */
  public function __construct(Request $request){
    $this->request = $request;
  }

  /**
   * obtenir la route retour
   * @param string $path
   * @param string|callable $callback
   * @return void
   */
  public function get($path, $callback){
      $this->routes['get'][$path] = $callback;
  }
  
  /**
   * algorythme de recherche de pages
   * @return string|false|void
   */
  public function resolve()
  {    
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    $callback = $this->routes[$method][$path] ?? false;

    // page 404
    if (!$callback) {
        echo "404 | Not Found";
        exit;
    } 
    
    //appelle de la vue
    if (is_string($callback)){
      return $this->renderView($callback);
    }

    // callback actif si appelle de fonction
    echo call_user_func($callback);
  }

  /**
   * Met à jour la vue avec le layout et le template
   * @param mixed $view
   * @return string|false
   */
  public function renderView($view)
  {
      $content = $this->renderContent($view);
      $layout = $this->renderLayout();

      return str_replace("{{ content }}", $content, $layout );
  }
  
  /**
   * recherche le template
   * @param mixed $view
   * @return string|false
   */
  public function renderContent($view)
  {
    ob_start();
    include_once __DIR__ . '/../views/'.$view.'.php';  
    return ob_get_clean();
  }
  
  /**
   * recherche le layout
   * @param mixed $view
   * @return string|false
   */
  public function renderLayout()
  {
    ob_start();
      include_once __DIR__ . '/../views/default.phtml'; 
    return ob_get_clean();
  }
}