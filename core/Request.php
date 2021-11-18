<?php

namespace App\Core;

class Request
{
  /**
   * return the request path
   * @return string
   */
  public function getPath()
  {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $pos = strpos($path, '?');

    if ($pos === false) {
      return $path;
    }
    return substr($path, 0, $pos);
  }

  /**
   * return the request method
   * @return string
   */
  public function getMethod()
  {
    return strtolower($_SERVER['REQUEST_METHOD']) ?? 'get';
  }
}
