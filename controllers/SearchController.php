<?php

class SearchController {
  public function indexAction() {
    $title = 'Search';
    if (isset($_GET['s'])) {
      $s = $_GET['s'];
      $dbh = new Database();

      $films = $dbh->query("SELECT * FROM film WHERE title LIKE :term", [':term' => "%$s%"]);
    }
    $view = new View('search', compact('title', 'films', 's'));
    return $view;
  }
}
