<?php

namespace Models\Flash;

/**
 * Class Flash
 */
class Flash {

  /**
   * Set Session with the name and message
   * 
   * @param string $name
   * @param string $message
   */
  public static function create($name, $message) {
    $_SESSION[$name] = $message;
  }

  /**
   * Reset Session
   * 
   * @param string $name
   */
  public static function reset($name) {
    $_SESSION[$name] = false;
  }
}