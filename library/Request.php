<?php

/**
 * Cada clase tiene su propio archivo.
 * Nombre de la clase es igual al nombre del archivo.
 */

/**
 * Esta clase se encarga de interpretar la url
 * y despues llamar al controlador indicado.
 */

class Request {
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

  public function execute() {
    $controllerClassName = $this->getControllerClassName();
    $controllerFileName = $this->getControllerFileName();
    $actionMethodName = $this->getActionMethodName();
    $params = $this->getParams();

    // Esto se hace con manejo de excepciones try/catch
    if (!file_exists($controllerFileName)) {
      $controllerClassName = 'errorController';
      $controllerFileName = 'controllers/errorController.php';
    }

    // Require al FileName
    require $controllerFileName;

    // Instanciamos una clase dinámicamente con ayuda de los métodos que ya hemos creado.
    $controller = new $controllerClassName();

    // Ejecutamos el método del controlador con los parámetros que necesita
    // Recibimos la respuesta generada por el controlador.
    $response = call_user_func_array([$controller, $actionMethodName], $params);

    $this->executeResponse($response);
  }

  public function executeResponse($response) {
    // Si es una clase hija de Response(algún tipo de respuesta),
    // entonces ejecutamos su método execute()
    if ($response instanceof Response) {
      $response->execute();
    } else {
      exit('Respuesta no válida');
    }
  }

}
