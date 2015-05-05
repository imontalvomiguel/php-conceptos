<?php

  class FilmsController {
    public function indexAction() {
      echo('indexAction de Films');
      die();
    }

    public function ciudadAction($film) {
      echo("Films mostrar $film");
      die();
    }
  }

  //if (!empty($_GET['id'])) {
    //$film_id = intval($_GET['id']);

    //// Título de la página
    //$title = 'Films';

    //// Obener un film por idividual
    //$film = get_film_single($film_id);

    //if ($film) {
      //// Si el film existe mando la vista
      //view('films', compact('film', 'title'));
    //} else {
      //redirect('Location: ./404');
    //}

  //} else {
    //redirect('Location: ./404');
  //}
