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

  public function addOne($table, $data) {
    $name = $data['name']['value'];
    $email = $data['email']['value'];
    $title = $data['title']['value'];
    $text = $data['text']['value'];
    $sql = "INSERT INTO $table (`id`, `name`, `email`, `title`, `text`, `time`) VALUES (NULL, '$name', '$email', '$title', '$text', CURRENT_TIMESTAMP)";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    return true;
  }
}
