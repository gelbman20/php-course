<?php

class Flash {
  public static function create($var, $message) {
    $_SESSION[$var] = $message;
  }

  public static function reset($var) {
    $_SESSION[$var] = false;
  }
}