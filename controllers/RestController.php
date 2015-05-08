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
    $films = get_films_rated();

    $data = new ResponseJson($films);
    return $data;
  }

  public function filmsAction($params) {
    $limit = 10;
    $p = ( isset($params) ? $params : 1 ); // Si traemos el parámetro de la página lo asignamos, en caso contrario sera 1
    $start = ($p-1) * $limit;
    $films = get_films_subset($start, $limit);

    $data = new ResponseJson($films);
    return $data;
  }

  public function filmAction($params) {
    $film = get_film_single($params);

    // Si el film existe mando la vista
    $data = new ResponseJson($film);
    return $data;
  }
}
