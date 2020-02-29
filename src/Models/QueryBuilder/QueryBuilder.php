<?php

namespace Models\QueryBuilder;

use Aura\SqlQuery\QueryFactory;
use PDO;

/**
 * Class QueryBuilder
 */
class QueryBuilder {
  private $pdo;
  private $queryFactory;

  /**
   * Create PDO Connection and QueryFactory
   * @param PDO $pdo
   */
  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
    $this->queryFactory = new QueryFactory('mysql');
  }

  /**
   * Get all rows from the table
   *
   * @param string $table
   * @return array
   */
  public function getAll(string $table) {
    $select = $this->queryFactory->newSelect();
    $select->cols(['*']);
    $select->from($table);

    $statement = $this->pdo->prepare($select->getStatement());
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Get the one record from the Table
   * 
   * @param string $table
   * @param int $id
   * @return array
   */
  public function getOne(string $table, int $id) {
    $select = $this->queryFactory->newSelect();
    $select->cols(['*']);
    $select->from($table);
    $select->where("id = $id");
    $select->bindValue("id", $id);
    
    $statement = $this->pdo->prepare($select->getStatement());
    $statement->execute($select->getBindValues());
    
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * Create new record in Table
   * 
   * @param string $table
   * @param array $data
   * @return $this
   */
  public function create(string $table, array $data) {
    $insert = $this->queryFactory->newInsert();
    $insert->into($table)->cols($data);
    
    $statement = $this->pdo->prepare($insert->getStatement());
    $statement->execute($insert->getBindValues());

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
  public function update(string $table, array $data, int $id) {
    $update = $this->queryFactory->newUpdate();
    $update->table($table)->cols($data)->where("id = $id");
    
    $statement = $this->pdo->prepare($update->getStatement());
    $statement->execute($update->getBindValues());

    return $this;
  }


  /**
   * Remove row in the Table
   * 
   * @param string $table
   * @param int $id
   * @return $this
   */
  public function delete(string $table, int $id) {
    $delete = $this->queryFactory->newDelete();
    $delete->from($table)->where("id = $id")->bindValue('id', $id);
    
    $statement = $this->pdo->prepare($delete->getStatement());
    $statement->execute($delete->getBindValues());

    return $this;
  }
}