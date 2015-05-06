<?php
/**
 * La respuesta puede ser de muchos tipos: html, json, csv, etc.
 *
 * Clases abstractas, nos sirven para definir una interface o contrato para enviarle
 * la respuesta al usuario.
 *
 */
abstract class Response {
  /**
   * Las clases hijas DEBEN implementar el método abstracto execute()
   */
  abstract function execute();
}
