<?php

class Connections {
  public static function make($config) {
    return new PDO("{$config['connection']}={$config['host']};dbname={$config['database']};charset={$config['charset']};", $config['username'], $config['password']);
  }
}