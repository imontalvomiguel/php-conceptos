<?
/**
 * Esta clase se encarga de interpretar la url
 * y despues llamar al controlador indicado.
 */

class RequestUrl {
  // Propiedades de la clase.
  // Suelen ser protected.
  // Se suelen crear métodos para tener acceso a las propiedades para tener mayor seguridad en la clase.
  protected $url;
  protected $controller;
  protected $defaultController = 'home';
  protected $action;
  protected $defaultAction = 'index';
  protected $params = array(); // Valor por defecto, sabemos que esperamos un arreglo aquí.

  // Método constructor que se llama automáticamente cada vez que se instancía la clase.
  // Métodos suelen ser public.
  public function __construct($url) {
    $this->url = $url;
    /**
      * La url va tener varios segmentos
     * controlador/accion/parametros
     * la función explode() nos permite
     * dividir una cadena por un delimitador
     */
    $segments = explode('/', $this->getUrl());

    $this->resolveController($segments);
    $this->resolveAction($segments);
    $this->resolveParams($segments);
  }

  /**
    * Pasamos $segments por referencia o puntero para poder quitarle
    * un pedacito y devolverlo sin ese pedacito.
    * Paso por valor es una copia y nunca se afecta el valor original.
   */
  public function resolveController(&$segments) {
    // Quita del arreglo el primer elemento y me lo devuelve.
    $this->controller = array_shift($segments);

    // Si el controlador es vacio, le asignaremos un valod por defecto.
    if (empty($this->controller)) {
      $this->controller = $this->defaultController;
    }

  }

  public function resolveAction(&$segments) {
    $this->action = array_shift($segments);

    if (empty($this->action)) {
      $this->action = $this->defaultAction;
    }

  }

  // Todo lo que resta de la url son parámetros ya no los pasamos por referencia si no por valor.
  public function resolveParams($segments) {
    $this->params = $segments;
  }

  public function getUrl() {
    return $this->url;
  }

  public function getController() {
    return $this->controller;
  }

  public function getControllerClassName() {
    // Llamamos al método estático ::camel() de la clase Inflector
    return Inflector::camel($this->getController()) . 'Controller';
  }

  public function getControllerFileName() {
    return 'controllers/' . $this->getControllerClassName() . '.php';
  }

  public function getAction() {
    return $this->action;
  }

  public function getActionMethodName() {
    return Inflector::lowerCamel($this->getAction()) . 'Action';
  }

  public function getParams() {
    return $this->params;
  }
}
