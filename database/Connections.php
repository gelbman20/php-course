<?php

class Connections {
  public static function make() {
    return new PDO("mysql:host=localhost;dbname=php_course_local;charset=utf8;", "root", "");
  }
}