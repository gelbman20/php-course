<?php

/**
 * Class Flash - output flash message/notification output
 */
class Flash {

  /**
   * @param string $var
   * @param string $message
   */
  public static function create($var, $message) {
    $_SESSION[$var] = $message;
  }

  /**
   * @param string $var
   */
  public static function reset($var) {
    $_SESSION[$var] = false;
  }
}