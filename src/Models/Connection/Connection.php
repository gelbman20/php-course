<?php

/**
 * Class Connection - create PDO connection
 */
class Connection {

  /**
   * @param array $config
   * @return PDO
   */
  public static function create($config) {
    return new PDO("{$config['connection']}={$config['host']};dbname={$config['database']};charset={$config['charset']};", $config['username'], $config['password']);
  }
};
