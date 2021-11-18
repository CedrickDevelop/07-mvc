<?php

namespace app\Controller;


  class ContactManager 
  {

    private $view;

    // Appelle la vue
      static public function getView(){
        //adresse de la vue 
        $view = __DIR__.'/views/contact.phtml';

        require ('../views/contact.phtml');
        // require (__DIR__.'/views/contact.phtml');
        // header('Location:'.$view);

      }

      
  }

?>