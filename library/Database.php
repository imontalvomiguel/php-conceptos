<?php

/**
* Todos los métodos relacionados con la base de datos
* están agrupados en esta clase.
 *
 */
class Database {

  protected $conn;

  public function __construct() {
    // Conexión con PDO a la base de datos
    // El constructor try / catch nos ayuda a manejar errores y Excepciones
    try{
      // Creamos el objeto PDO
      $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

      // Establecemos que el objeto $db nos lance cualquier tipo de Exeption cuando lo manipulemos...
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Use the native server-side prepared statements
      $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      $this->conn = $conn;

    } catch(Exception $e) { // Si algo falla en la conexión, queremos caputurar la Exeption y hacer algo...
      // $e es un objeto instancia de Exception
      echo $e->getMessage();
      die();
    }
  }

  public function getConn() {
    return $this->conn;
  }

  public function all($table)
  {
    /**
     * Query method.
     */
    try {
      $conn = $this->getConn();
      $results = $conn->query("SELECT * FROM $table");
      return $results->fetchAll(\PDO::FETCH_ASSOC);
    } catch(\Exception $e) {
      echo $e->getMessage();
      die();
    }
  }

  function query($query, $bindings = array())
  {
    try {
      /**
       * Prepared Statements
       */
      $conn = $this->getConn();
      $results = $conn->prepare($query);
      $results->execute($bindings);
      return $results;
    } catch(\Exception $e) {
      echo $e->getMessage();
      die();
    }
  }

  function find($table, $key, $value)
  {
    $conn = $this->getConn();
    $query = $this->query("SELECT * FROM $table WHERE $key = :value LIMIT 1", [':value' => $value], $conn);
    return $query->fetch(\PDO::FETCH_ASSOC);
  }

}
