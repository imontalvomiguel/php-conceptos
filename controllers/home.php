<?php
/**
 * Lógica de programación
 */

  // Título de la página
  $title = 'Rental Rate';
  $films = get_films_rated();

  $vars = array(
    'films' => $films,
    'title' => $title
  );

  view('home', $vars);
