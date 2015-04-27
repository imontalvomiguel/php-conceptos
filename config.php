<?php
  /**
   * Errores en php
   * Fatales.- Terminan la ejecución de la aplicación (require())
   * Warnings.- Cuando un tratas de incluir algo que no existe, etc (include())
   * Notice.- Error no tan importante, como cuando usas una variable no definida
   */

  // Mostrar errores, estamos en desarrollo
  ini_set('display_errors', 'on'); // En el php.ini se establecen los settings, modificable en tiempo real
  error_reporting(E_ALL); // Php... quiero ver todos los errores
