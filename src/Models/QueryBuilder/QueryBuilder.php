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

  /**
   * @param string $table
   * @param array $data
   * @return bool
   */
  public function addOne($table, $data) {
    $name = $data[0]['value'];
    $email = $data[1]['value'];
    $title = $data[2]['value'];
    $text = $data[3]['value'];
    $time = $data[4]['value'];
    $sql = "INSERT INTO $table (`id`, `name`, `email`, `title`, `text`, `time`) VALUES (NULL, '$name', '$email', '$title', '$text', '$time')";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    return true;
  }
}