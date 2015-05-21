<?php
  // Realizar la consulta de las películas con mejor rating
  class Film extends BaseModel {

    public function getFilmsRated() {
      $query = "SELECT * FROM film ORDER BY rental_rate DESC LIMIT 10";
      //$results = parent::query($query);
      $db = parent::getConnection();
      try {
        $results = $db->query($query);
      } catch (exception $e) {
        echo $e->getmessage;
        die();
      }
      $films = $results->fetchall(PDO::FETCH_ASSOC);
      return $films;
    }

    // Realizar consulta para traer un film por individual
    public function getFilmSingle($film_id) {
      try {
        $db = parent::getConnection();
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

    // Realizar la consulta para traer un rango de films
    public function getFilmsSubset($start, $limit) {
      try {
        $db = parent::getConnection();
        $results = $db->prepare('SELECT * FROM film ORDER BY film_id LIMIT :start, :limit');
        $results->bindValue(':start', $start, PDO::PARAM_INT);
        $results->bindValue(':limit', $limit, PDO::PARAM_INT);
        $results->execute();
      } catch (Exception $e) {
        echo $e->getMessage();
      }
      $films = $results->fetchall(PDO::FETCH_ASSOC);
      return $films;
    }

    // Realiza la consulta para saber cuantas filas de la tabla film tenemos
    public function getFilmsTotal() {
      try {
        $db = parent::getConnection();
        $results = $db->query('SELECT COUNT(film_id) FROM film');
      } catch (Exception $e) {
        echo $e->getMessage();
      }
      $count = $results->fetchColumn();
      return $count;
    }

    // Realizar la consulta para traer todas las films
    public function getFilmsAll() {
      // Para realizar consultar con el objeto PDO, es bueno que lo hagamos manejando Excepciones
      try {
        // Acceso a la variable $db en el scope global
        $db = parent::getConnection();
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

    // Realiza la consulta dada una palabra clave
    function getFilmsSearch($s) {
      try {
        $db = parent::getConnection();
        $results = $db->prepare("SELECT * FROM film WHERE title LIKE ?");
        $results->bindValue(1,"%" . $s . "%");
        $results->execute();
      } catch (Exception $e) {
        echo $e->getMessage();
      }
      $films = $results->fetchall(PDO::FETCH_ASSOC);
      return $films;
    }

  }
