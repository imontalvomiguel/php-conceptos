<?php

/**
 * Cada clase tiene su propio archivo.
 * Nombre de la clase es igual al nombre del archivo.
 */

class Request {

  protected $requestUrl;

  public function __construct($requestUrl) {
    $this->requestUrl = $requestUrl;
  }

  public function getRequestUrl() {
    return $this->requestUrl;
  }

  public function execute() {
    $requestUrl = $this->getRequestUrl();

    $controllerClassName = $requestUrl->getControllerClassName();
    $controllerFileName = $requestUrl->getControllerFileName();
    $actionMethodName = $requestUrl->getActionMethodName();
    $params = $requestUrl->getParams();

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
