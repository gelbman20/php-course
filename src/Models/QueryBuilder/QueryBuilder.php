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
   * Get the record from the Table
   * 
   * @param string $table
   * @param int $id
   * @return array
   */
  public function getOne($table, $id) {
    $sql = "SELECT * FROM $table WHERE id=:id";
    $statement = $this->pdo->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * Create new record in Table
   * 
   * @param string $table
   * @param array $data
   * @return $this
   */
  public function create($table, $data) {
    $get_keys = array_keys($data);
    $keys = implode(',', $get_keys);
    $tags = ":" . implode(", :", $get_keys);

    $sql = "INSERT INTO $table ($keys) VALUES ($tags)";
    $statement = $this->pdo->prepare($sql);

    foreach ($data as $key => $value) {
      $statement->bindValue($key, $value);
    }

    $statement->execute();

    return $this;
  }

  /**
   * Change row in the Table
   * 
   * @param string $table
   * @param array $data
   * @param int $id
   * @return $this
   */
  public function update($table, $data, $id) {
    $keys = array_keys($data);

    $string = '';

    foreach ($keys as $key) {
      $string .= $key . '=:' . $key . ',';
    }

    $keys = rtrim($string, ',');

    $data['id'] = $id;

    $sql = "UPDATE $table SET $keys WHERE id=:id";
    $statement = $this->pdo->prepare($sql);
    $statement->execute($data);

    return $this;
  }


  /**
   * Remove row in the Table
   * 
   * @param string $table
   * @param int $id
   * @return $this
   */
  public function delete($table, $id) {
    $sql = "DELETE FROM $table WHERE id=:id";
    $statement = $this->pdo->prepare($sql);
    $statement->execute([
      'id' => $id
    ]);

    return $this;
  }
}