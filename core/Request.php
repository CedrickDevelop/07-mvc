<?php


  namespace App\Core;

  class Request 
  {

    // Recuperation de l'adresse sur laquelle on se trouve
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

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']) ?? 'get';
    }
  }

?>
