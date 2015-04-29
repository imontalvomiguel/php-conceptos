<?php
  // Mandamos a la cabecera del navegador diciendo que hubo un error 404
  header("HTTP/1.0 404 Not Found");
  view('404', ['title' => 'Error 404']);
