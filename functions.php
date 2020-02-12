<?php

function dd($date = "Where data shit man?") {
  echo "<pre>";
  var_dump($date);
  echo "</pre>";
  die();
}

function connectToDB() {
  return new PDO("mysql:host=localhost;dbname=php_course_local;charset=utf8;", "root", "");
}