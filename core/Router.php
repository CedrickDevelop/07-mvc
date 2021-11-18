<?php

namespace App\Core;

use App\Core\Request;

class Router
{
  protected $routes = [];
  public Request $request;

  /**
   * Router constructor.
   * @param Request $request
   * @return void
   */
  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  /**
   * subscribe get request to the router
   * @param string $path
   * @param callable|string $callback
   * @return void
   */
  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  /**
   * subscribe post request to the router
   * @param string $path
   * @param callable|string $callback
   * @return void
   */
  public function post($path, $callback)
  {
    $this->routes['post'][$path] = $callback;
  }

  /**
   * resolve the request with approriate callback
   * @return callable|string
   */
  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    $callback = $this->routes[$method][$path] ?? false;

    if (!$callback) {
      header('HTTP/1.0 404 Not Found');
      return "404 | Not Found";
    }

    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    return call_user_func($callback);
  }

  /**
   * render view
   * @param string $view
   * @return string
   */
  public function renderView($view)
  {
    $layoutContent = $this->layoutContent();
    $viewContent = $this->viewContent($view);
    return str_replace('{{ content }}', $viewContent, $layoutContent);
  }

  /**
   * get layout content
   * @return string
   */
  public function layoutContent()
  {
    ob_start();
    include_once Application::$ROOT_DIR . "/views/layouts/main.php";
    return ob_get_clean();
  }

  /**
   * get view content
   * @param string $view
   * @return string
   */
  public function viewContent($view)
  {
    ob_start();
    include_once Application::$ROOT_DIR . "/views/{$view}.php";
    return ob_get_clean();
  }
}
