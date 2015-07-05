<?php
/**
 * Lógica de programación
 */

  class HomeController {

    public function indexAction() {
      $title = 'Rental Rate';
      // Instancia de la conexión a la DB
      $dbh = new Database();
      // Custom query
      $films = $dbh->query('SELECT * FROM film ORDER BY rental_rate DESC LIMIT 10');

      $vars = array(
        'films' => $films,
        'title' => $title
      );

      $view = new View('home', $vars);

      return $view;
    }
  }



