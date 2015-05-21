<?php

  class BaseModel {
    protected $connection;

    public function __construct()
    {
      $connection = new Connection();
      $this->connection = $connection->getPDO();
    }

    public function getConnection()
    {
      return $this->connection;
    }

  }
