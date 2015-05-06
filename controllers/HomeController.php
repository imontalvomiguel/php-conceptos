<?php
/**
 * Lógica de programación
 */

  class HomeController {

    public function indexAction() {
      $title = 'Rental Rate';
      $films = get_films_rated();

      $vars = array(
        'films' => $films,
        'title' => $title
      );

      $view = new View('home', $vars);

      return $view;
    }
  }



