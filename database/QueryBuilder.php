<?php

class QueryBuilder {

  protected $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  function getAll($table) {
    $sql = "SELECT * FROM $table";
    $statement = $this->pdo->prepare($sql);
    
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function create($table, $data = []) {
    $get_keys = array_keys($data);
    $keys = implode(",", $get_keys);
    $tags = ":".implode(", :", $get_keys);
    
    $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";
    
    $statement = $this->pdo->prepare($sql);
    foreach ($data as $key => $value) {
      $statement->bindValue($key, $value);
    }
    $statement->execute();
  }
}