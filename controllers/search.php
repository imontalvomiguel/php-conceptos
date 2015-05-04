<?php

  $title = 'Search';
  if (isset($_GET['s'])) {
    $s = $_GET['s'];
    $films = get_films_search($s);
  }
  view('search', compact('title', 'films', 's'));
