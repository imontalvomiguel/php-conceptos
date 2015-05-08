<?php
/**
 * La clase View es hija de Response(abstracta).
 * Cada respuesta necesita la implementación concreta de los métodos
 * abstractos
 */
class View extends Response {

  // Propiedades de la clase View:
  protected $template;
  protected $layout = 'layout';
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

  public function getTemplateFileName() {
    $template = $this->getTemplate();
    return "views/$template.tpl.php";
  }

  public function getLayout() {
    return $this->layout;
  }

  public function getLayoutFile() {
    $layout = $this->layout;
    return "views/$layout.tpl.php";
  }

  // Implementamos el método abstracto execute (obligatorio)
  public function execute() {
    $vars = $this->getVars();
    $template = $this->getTemplate();

    // Le pasamos las variables que queremos que la función tenga acceso. (Encapsulamiento / Restringir acceso)
    call_user_func(function() use ($template, $vars) {
      extract($vars);
      // Para toda la salida de texto enviada al cliente y almacenarlo en una variable.
      ob_start();
      $templateFileName = $this->getTemplateFileName();
      require $templateFileName;

      // Asignamos a una variable la salida del template
      $tpl_content = ob_get_clean();

      // Incluimos el layout común header,footer,sidebar,etc
      $layoutFile = $this->getLayoutFile();
      require $layoutFile;
    });
  }

}
