<?php

  /**
   * Este es nuestro FRONTEND CONTROLLER
   * se encarga de realizar las configuraciones necesarias para que
   * nuestra aplicación funcione correctamente.
   * Se encargará de hacer checkeos de seguridad para dejar a los
   * controladores limpios.
   */

  require_once('config.php'); // Settings de la aplicación
  require_once('helpers.php'); // Helpers
  require_once('database.php'); // PDO para conexión a la base de datos

  // LLAMAR A LOS CONTROLADORES INDIVIDUALES
  if (empty($_GET['url'])) {
    require 'controllers/home.php';
  } elseif ($_GET['url'] == 'films') {
    require 'controllers/films.php';
  } else {
    // Mandamos a la cabecera del navegador diciendo que hubo un error 404
    header("HTTP/1.0 404 Not Found");
    // Mensaje al usuario de 404 o vista
    exit('Página no encontrada');
  }
