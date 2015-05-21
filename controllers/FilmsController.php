<?php

  class FilmsController {
    public function indexAction() {
      echo('indexAction de Films');
      die();
    }

    public function printAction($film_id) {
      // Título de la página
      $title = 'Films';

      // Obener un film por idividual
      // Instanciando el modelo
      $filmModel = new Film();
      // Pidiendo la data al modelo
      $film = $filmModel->getFilmSingle($film_id);

      // Si el film existe mando la vista
      $view = new View('films', compact('film', 'title'));
      return $view;
    }
  }


