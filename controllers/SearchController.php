<?php

class SearchController {
  public function indexAction() {
    $title = 'Search';
    if (isset($_GET['s'])) {
      $s = $_GET['s'];
      $films = get_films_search($s);
    }
    $view = new View('search', compact('title', 'films', 's'));
    return $view;
  }
}
