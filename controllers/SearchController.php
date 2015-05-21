<?php

class SearchController {
  public function indexAction() {
    $title = 'Search';
    if (isset($_GET['s'])) {
      $s = $_GET['s'];
      $filmModel = new Film();

      $films = $filmModel->getFilmsSearch($s);
    }
    $view = new View('search', compact('title', 'films', 's'));
    return $view;
  }
}
