<?php

  /**
   * Este es nuestro FRONTEND CONTROLLER
   * se encarga de realizar las configuraciones necesarias para que
   * nuestra aplicación funcione correctamente.
   * Se encargará de hacer checkeos de seguridad para dejar a los
   * controladores limpios.
   */

  require_once('config.php'); // Settings de la aplicación

  // Library
  require_once('library/Database.php'); // PDO para conexión a la base de datos
  require 'library/Request.php';
  require 'library/RequestUrl.php';
  require 'library/Inflector.php';
  require 'library/Response.php';
  require 'library/View.php';
  require 'library/ResponseJson.php';

  if (empty($_GET['url'])) {
    $url = '';
  } else {
    $url = $_GET['url'];
  }

  $requestUrl = new RequestUrl($url);
  $request = new Request($requestUrl);
  $request->execute();
