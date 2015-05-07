<?php

class ListController {
  public function indexAction() {
    $title = 'View List';
    $limit = 10;
    $p = 1; // Por default mostraremos la primera página
    $start = ($p-1) * $limit;
    $films = get_films_subset($start, $limit);
    $filmsCount = get_films_total();
    $pagesTotal = (ceil( $filmsCount / $limit ));
    $pagesLimit = ceil($p / $limit) * $limit;
    $pagesStart = $pagesLimit - $limit + 1;

    $view = new View('list', compact('p', 'films', 'title', 'filmsCount', 'pagesTotal', 'pagesLimit', 'pagesStart', 'limit'));
    return $view;
  }

  public function pageAction($params) {
    $title = 'View List';
    $limit = 10;
    $p = ( isset($params) ? $params : 1 ); // Si traemos el parámetro de la página lo asignamos, en caso contrario sera 1
    $start = ($p-1) * $limit;
    $films = get_films_subset($start, $limit);
    $filmsCount = get_films_total();
    $pagesTotal = (ceil( $filmsCount / $limit ));
    $pagesLimit = ceil($p / $limit) * $limit;
    $pagesStart = $pagesLimit - $limit + 1;

    $view = new View('list', compact('p', 'films', 'title', 'filmsCount', 'pagesTotal', 'pagesLimit', 'pagesStart', 'limit'));
    return $view;
  }
}

