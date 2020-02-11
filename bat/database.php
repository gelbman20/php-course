<?php

class Database {
  private $driver = 'mysql';
  private $host = 'localhost';
  private $db_name = 'php_course';
  private $db_user = 'root';
  private $db_password = '';
  private $charset = 'utf8';
  private $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  private $dsn = null;
  private $PDO = null;

  public function __construct() {
    $this->dsn = "$this->driver:host=$this->host;dbname=$this->db_name;charset=$this->charset";
    $this->PDO = new PDO($this->dsn, $this->db_user, $this->db_password, $this->options);
  }

  public function checkEmail($email) {
    foreach ($this->PDO->query("SELECT * FROM `users` WHERE `email` = '$email'") as $row) {
      if(!empty($row)) {
        return true;
      }
    }

    return false;
  }

  public function addUser($name, $email, $password) {
    if (!$this->checkEmail($email)) {
      $this->PDO->query("INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password')");
      return true;
    }

    return false;
  }
}