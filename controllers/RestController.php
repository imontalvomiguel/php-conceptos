<?php

class RestController {
  public function indexAction() {
    $title = 'Rest';
    $view = new View('rest', array(
      'title' => $title
    ));
    return $view;
  }

  public function rentalRateAction() {
    $dbh = new Database();
    $films = $dbh->query('SELECT * FROM film ORDER BY rental_rate DESC LIMIT 10');
    $filmsArr = array();

    // Todo refactor this
    foreach ($films as $film) {
      $filmsArr[] = $film;
    }
    $data = new ResponseJson($filmsArr);
    return $data;
  }

  public function filmsAction($params) {
    $limit = 10;
    $p = ( isset($params) ? $params : 1 ); // Si traemos el parámetro de la página lo asignamos, en caso contrario sera 1
    $start = ($p-1) * $limit;
    $dbh = new Database();
    $films = $dbh->query('SELECT * FROM film LIMIT :start, :limit', [':start' => $start, ':limit' => $limit]);

    // Todo refactor this
    $filmsArr = array();
    foreach ($films as $film) {
      $filmsArr[] = $film;
    }

    $data = new ResponseJson($filmsArr);
    return $data;
  }

  public function filmAction($params) {
    $dbh = new Database();
    $film = $dbh->find('film', 'film_id', $params);
    $data = new ResponseJson($film);
    return $data;
  }
}
