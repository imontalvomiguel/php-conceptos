<?php

  if (!empty($_GET['id'])) {
    $film_id = intval($_GET['id']);

    // Título de la página
    $title = 'Films';

    // Para realizar consultar con el objeto PDO, tambíen manejaremos las Exceptions
    try {
      // Prepara la sonsulta SQL para ser ejecucata, utilizamos un placeholder ?
      $results = $db->prepare('SELECT * FROM film WHERE film_id = ?');

      // Asignamos los parámetros de la constulta con el método bindParam
      $results->bindParam(1, $film_id);

      // Ejecutar la consulta
     $results->execute();

      /**
        * El objeto tiene el método fetchAll para retornar un arreglo con los resultados,
        * el argumento le indica que quiero un array asociativo.
       */
      $film = $results->fetch(PDO::FETCH_ASSOC);

    } catch(Exception $e) {
      echo $e->getMessage();
      die();
    }

    view('films', compact('film', 'title'));
  } else {
    header("HTTP/1.0 404 Not Found");
    exit('Página no encontrada');
  }
