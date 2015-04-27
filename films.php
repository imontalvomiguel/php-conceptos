<?php
  require_once('config.php');
  require_once('helpers.php');
  require_once('database.php');

  if (!empty($_GET['id'])) {
    $id = intval($_GET['id']);
  } else {
    $id = null;
  }

  // Título de la página
  $title = 'Films';

  // Para realizar consultar con el objeto PDO, tambíen manejaremos las Exceptions
  try {
    // Hacemos nuestra consulta... Nos regresa un objeto tipo PDOStatement
    $results = $db->query('SELECT * FROM film WHERE film_id = ' . $id );

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
