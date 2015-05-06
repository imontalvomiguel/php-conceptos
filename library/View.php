<?php
/**
 * La clase View es hija de Response(abstracta).
 * Cada respuesta necesita la implementación concreta de los métodos
 * abstractos
 */
class View extends Response {

  // Propiedades de la clase View:
  protected $template;
  protected $vars = array();

  // Obligatorio $template y vars para crear una instancia de Vista.
  public function __construct($template, $vars = array()) {
    $this->template = $template;
    $this->vars = $vars;
  }

  public function getVars() {
    return $this->vars;
  }

  public function getTemplate() {
    return $this->template;
  }

  public function execute() {
    $vars = $this->getVars();
    $template = $this->getTemplate();

    // Le pasamos las variables que queremos que la función tenga acceso. (Encapsulamiento / Restringir acceso)
    call_user_func(function() use ($template, $vars) {
      extract($vars);
      require "views/$template.tpl.php";
    });
  }

}
