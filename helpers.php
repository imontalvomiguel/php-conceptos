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
    include "views/$template.tpl.php";
  }

  // Llamar a los controladores individuales
  function controller($name) {
    if (empty($name)) {
      // Si está vacío el $name, le asignaremos un valor por defecto
      $name = 'home';
    }

    $file = "controllers/$name.php";

    if (file_exists($file)){ // Si el controlador existe
      require $file;
    } else {
      // Redirección a controlador 404
      redirect('Location: ./404');
    }
  }

  // Función para redireccionar
  function redirect($location) {
    // Redirección a controlador 404
    header($location);
    exit();
  }

  // Realizar la consulta para traer todas las films
  function get_films_all() {
    // Para realizar consultar con el objeto PDO, es bueno que lo hagamos manejando Excepciones
    try {
      // Acceso a la variable $db en el scope global
      global $db;
      // Hacemos nuestra consulta... Nos regresa un objeto tipo PDOStatement
      $results = $db->query('SELECT * FROM film');
    } catch(Exception $e) {
      // Si algo falla entonces mandamos el mensaje y muere la aplicación
      echo $e->getMessage();
      die();
    }
    /**
      * El objeto tiene el método fetchAll para retornar un arreglo con los resultados,
      * el argumento PDO::FETH_ASSOC le indica que quiero un array asociativo.
     */
    $films = $results->fetchall(PDO::FETCH_ASSOC);
    return $films;
  }

  // Realizar la consulta de las películas con mejor rating
  function get_films_rated() {
    try {
      global $db;
      $results = $db->query("SELECT * FROM film ORDER BY rental_rate DESC LIMIT 10");
    } catch (Exception $e) {
      echo $e->getMessage;
      die();
    }
    $films = $results->fetchall(PDO::FETCH_ASSOC);
    return $films;
  }

  // Realizar consulta para traer un film por individual
  function get_film_single($film_id) {
    try {
      global $db;
      // Prepara la sonsulta SQL para ser ejecucata, utilizamos un placeholder ?
      $results = $db->prepare('SELECT * FROM film WHERE film_id = ?');

      // Asignamos los parámetros de la constulta con el método bindParam
      $results->bindParam(1, $film_id);

      // Ejecutar la consulta
     $results->execute();

    } catch(Exception $e) {
      echo $e->getMessage();
      die();
    }

    /**
      * El objeto tiene el método fetchAll para retornar un arreglo con los resultados,
      * el argumento le indica que quiero un array asociativo.
     */
    $film = $results->fetch(PDO::FETCH_ASSOC);
    return $film;
  }
