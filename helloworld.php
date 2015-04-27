<?php
/**
 * Lógica de programación
 */

  // Mostrar errores, estamos en desarrollo
  ini_set('display_errors', 'on');

  // Variables de la conexión a la base de datos
  $dsn = 'mysql:host=localhost;dbname=sakila';
  $username = 'root';
  $password = 'root';

  // Título de la página
  $title = 'Films';

  // Conexión con PDO a la base de datos
  // El constructor try / catch nos ayuda a manejar errores y Excepciones
  try{
    // Creamos el objeto PDO
    $db = new PDO($dsn, $username, $password);

    // Establecemos que el objeto $db nos lance cualquier tipo de Exeption cuando lo manipulemos...
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(Exception $e) { // Si algo falla en la conexión, queremos caputurar la Exeption y hacer algo...
    // $e es un objeto instancia de Exception
    echo $e->getMessage();
    die();
  }

  // Para realizar consultar con el objeto PDO, tambíen manejaremos las Exceptions
  try {
    // Hacemos nuestra consulta... Nos regresa un objeto tipo PDOStatement
    $results = $db->query('SELECT * FROM film');

    /**
      * El objeto tiene el método fetchAll para retornar un arreglo con los resultados,
      * el argumento le indica que quiero un array asociativo.
     */
    $films = $results->fetchall(PDO::FETCH_ASSOC);

  } catch(Exception $e) {
    echo $e->getMessage();
    die();
  }

  /**
   * Encapsular algo que solo está disponible en el scope o espacio que nosotros le digamos.
   * Por ejemplo una contraseña o información sencible que no queremos tener en nuestra vista.
   * Podemos encapsular código en PHP dentro del contexto de una función:
   * Como argumentos solo le pasaremos las variables que la vista necesita y nada más.
   */
  function view($films, $title) {
    include 'view.php';
  }
  view($films, $title);
