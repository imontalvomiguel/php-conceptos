<?php

  class ResponseJson extends Response {
    protected $array;

    public function __construct($array) {
      $this->array = $array;
    }

    public function getArray() {
      return $this->array;
    }

    public function execute() {
      $array = $this->getArray();
      echo json_encode($array);
    }
  }
