<?php

/**
 * Class QueryBuilder
 */
class QueryBuilder {
  private $pdo;

  /**
   * QueryBuilder constructor.
   * @param PDO $pdo
   */
  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  /**
   * @param string $table
   * @return array
   */
  public function getAll($table) {
    $sql = "SELECT * FROM $table";

    $statement = $this->pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}
