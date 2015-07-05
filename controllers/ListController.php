<?php

class ListController {
  public function indexAction() {
    $title = 'View List';

    $limit = 10;
    // Si traemos el parámetro de la página lo asignamos, en caso contrario sera 1
    $p = ( isset($_GET['page']) ? intval($_GET['page']) : 1 );
    $start = ($p-1) * $limit;

    $dbh = new Database();
    $films = $dbh->query('SELECT * FROM film LIMIT :start, :limit', [':start' => $start, ':limit' => $limit]);
    $filmsCount = count( $dbh->all('film') );

    $pagesTotal = (ceil( $filmsCount / $limit ));
    $pagesLimit = ceil($p / $limit) * $limit;
    $pagesStart = $pagesLimit - $limit + 1;

    $view = new View('list', compact('p', 'films', 'title', 'filmsCount', 'pagesTotal', 'pagesLimit', 'pagesStart', 'limit'));
    return $view;
  }
}
