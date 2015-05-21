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
    // Instancia del modelo
    $filmModel = new Film();
    // Pidiendo la data al modelo
    $films = $filmModel->getFilmsRated();
    $data = new ResponseJson($films);
    return $data;
  }

  public function filmsAction($params) {
    $limit = 10;
    $p = ( isset($params) ? $params : 1 ); // Si traemos el parámetro de la página lo asignamos, en caso contrario sera 1
    $start = ($p-1) * $limit;
    $filmModel = new Film();
    $films = $filmModel->getFilmsSubset($start, $limit);

    $data = new ResponseJson($films);
    return $data;
  }

  public function filmAction($params) {
    // Instanciando el modelo
    $filmModel = new Film();
    // Pidiendo la data al modelo
    $film = $filmModel->getFilmSingle($params);

    // Si el film existe mando la vista
    $data = new ResponseJson($film);
    return $data;
  }
}
