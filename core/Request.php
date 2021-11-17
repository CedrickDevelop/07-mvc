<?php


  namespace App\Core;

  class Request 
  {

    // Recuperation de l'adresse sur laquelle on se trouve
    public function getPath(){
      // Le chemin de l'adresse  
      $path = $_SERVER['REQUEST_URI']; 
      // Les arguments qui sont indiqués après le ?
        $pos = strpos($path, '?');
    }
  }

?>
