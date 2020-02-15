<?php
include "functions.php";
$db = include "database/start.php";

$title = $_POST["title"];

$db->create('posts', [
  "title" => $title
]);

header("Location: ./index.php");