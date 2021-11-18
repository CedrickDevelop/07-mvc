<?php


  namespace App\Core;

  class Request 
  {

    /**
     * return the request path
     * @return string
     */
    public function getPath(){

      // Le chemin de l'adresse  
      $path = $_SERVER['REQUEST_URI'] ?? '/'; 

      // Existe il un ? indiquant qu'il y a des paramètres
        $pos = strpos($path, '?');

        // on nettoie la route si elle a des parametres
        if ($pos === false) {
          return $path;
      }
      return substr($path, 0, $pos);
    }

    /**
     * retourne la methode en petit caractères
     * @return string
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']) ?? 'get';
    }
  }

?>
