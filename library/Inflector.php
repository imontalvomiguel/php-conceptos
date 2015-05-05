<?php

/**
 * Clases estáticas no se instanciían solo tienen métodos de utiliería.
 * Son funciones agrupadas en una clase.
 * Podemos usar los 4 puntos :: para acceder a esos métodos.
 */

class Inflector {
  // Al trabajar con métodos estáticos debemos agregar la palabra
  // static.
  public static function camel($value) {
    // Dividimos la cadena por guines
    $segments = explode('-', $value);

    // Iterar cada posición de los segmentos.
    // Pasamos por referencia por que necesitamos modificarlo
    array_walk($segments, function(&$item) {
      $item = ucfirst($item);
    });

    // Une los pedacitos de los segmentos y los regresa
    return implode('', $segments);
  }

  public static function lowerCamel($value) {
    // Para utilizar un método estático dentro de la clase estática,
    // Utilizamos ClassName::metodo() y no ->.
    // También podemos usar static::metodo()

    // lcfirst convierte la primera letra de la cadena en minúscula,
    // lo controario a ucfirst
    return lcfirst(Inflector::camel($value));
    // return static::camel($value);
  }
}
