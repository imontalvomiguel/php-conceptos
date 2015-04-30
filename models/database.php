<?php
  // Conexión con PDO a la base de datos
  // El constructor try / catch nos ayuda a manejar errores y Excepciones
  try{
    // Creamos el objeto PDO
    $db = new PDO('mysql:host='. DB_HOST . ';dbname='. DB_NAME, DB_USER, DB_PASS);

    // Establecemos que el objeto $db nos lance cualquier tipo de Exeption cuando lo manipulemos...
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(Exception $e) { // Si algo falla en la conexión, queremos caputurar la Exeption y hacer algo...
    // $e es un objeto instancia de Exception
    echo $e->getMessage();
    die();
  }
