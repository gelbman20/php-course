<?php

namespace Models\Connection;
use PDO;

/**
 * Class Connection
 * 
 * @author Andrii Helever <gelbman20@gmail.com>
 * @link https://github.com/gelbman20/php-course/tree/develop/src/Models/Connection
 */
class Connection {

  /**
   * Create PDO connection
   * 
   * @param array $config
   * @return PDO
   */
  public static function create($config) {
    return new PDO("{$config['connection']}={$config['host']};dbname={$config['database']};charset={$config['charset']};", $config['username'], $config['password']);
  }
};
