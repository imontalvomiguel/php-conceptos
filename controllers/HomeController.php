<?php
/**
 * Lógica de programación
 */

  class HomeController {

    public function indexAction() {
      $title = 'Rental Rate';
      // Instancia del modelo
      $filmModel = new Film();
      // Pidiendo la data al modelo
      $films = $filmModel->getFilmsRated();

      $vars = array(
        'films' => $films,
        'title' => $title
      );

      $view = new View('home', $vars);

      return $view;
    }
  }



