<?php
/**
 * Lógica de programación
 */

  // Título de la página
  $title = 'Films';
  $films = get_films_all();

  $vars = array(
    'films' => $films,
    'title' => $title
  );

  view('home', $vars);
