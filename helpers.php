<?php
  /**
   * Encapsular algo que solo está disponible en el scope o espacio que nosotros le digamos.
   * Por ejemplo una contraseña o información sencible que no queremos tener en nuestra vista.
   * Podemos encapsular código en PHP dentro del contexto de una función:
   * Como argumentos solo le pasaremos las variables que la vista necesita y nada más.
   */

  /**
   * Función reusable para cualquier cantidad de argumentos y un template.
   * Generalmente los argumentos requeridos van al inicio, los opcionales al final
   * Si queremos parámetros por defecto lo podemos establecer en los argumentos de la función $vars = array(), $optional = false, etc
   */
  function view($template, $vars = array()) {
    /**
     * exctract() nos permite convertir las llaves de un array asociativo a variables individuales
     */
    extract($vars);
    include "$template.php";
  }
