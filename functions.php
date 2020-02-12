<?php

function dd($date = "Where data shit man?") {
  echo "<pre>";
  var_dump($date);
  echo "</pre>";
  die();
}

function getAllPosts() {
  //1. Connect to DB
  $pdo = new PDO("mysql:host=localhost;dbname=php_course_local;charset=utf8;", "root", "");
  $sql = "SELECT * FROM posts";
  $statement = $pdo->prepare($sql);
  //2. Execute Query
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_ASSOC);
}