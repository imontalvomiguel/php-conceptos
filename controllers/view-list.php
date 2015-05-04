<?php
  $title = 'View List';
  $limit = 10;
  $p = ( isset($_GET['p']) ? $_GET['p'] : 1 );
  $start = ($p-1) * $limit;
  $films = get_films_subset($start, $limit);
  $filmsCount = get_films_total();
  $pagesTotal = (ceil( $filmsCount / $limit ));
  $pagesLimit = ceil($p / $limit) * $limit;
  $pagesStart = $pagesLimit - $limit + 1;
  view('view-list', compact('p', 'films', 'title', 'filmsCount', 'pagesTotal', 'pagesLimit', 'pagesStart', 'limit'));
