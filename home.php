<?php
/**
 * Lógica de programación
 */

  // Traemos los settings
  require_once('config.php');

  // Traemos los helpers
  require_once('helpers.php');

  // Traemos la instancia de PDO para conexión a base de datos
  require_once('database.php');

  // Título de la página
  $title = 'Films';

  // Para realizar consultar con el objeto PDO, tambíen manejaremos las Exceptions
  try {
    // Hacemos nuestra consulta... Nos regresa un objeto tipo PDOStatement
    $results = $db->query('SELECT * FROM film');

    /**
      * El objeto tiene el método fetchAll para retornar un arreglo con los resultados,
      * el argumento le indica que quiero un array asociativo.
     */
    $films = $results->fetchall(PDO::FETCH_ASSOC);

  } catch(Exception $e) {
    echo $e->getMessage();
    die();
  }

  $vars = array(
    'films' => $films,
    'title' => $title
  );

  view('home', $vars);
