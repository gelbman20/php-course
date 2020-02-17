<?php
// Controller
//include "../src/Controllers/Main.php";

// include "../src/Controllers/Create.php";

include "../src/Models/Validator/Validator.php";

$data = [
  "name" => [
    "name" => "name",
    "value" => 'Andrii Helever',
    "type" => "text"
  ],
  "email" => [
    "name" => "email",
    "value" => $_POST["email"],
    "type" => "email"
  ],
  "title" => [
    "name" => "title",
    "value" => $_POST["title"],
    "type" => "text"
  ],
  "text" => [
    "name" => "text",
    "value" => $_POST["text"],
    "type" => "text"
  ]
];

$validator = new Validator($data);

$validator->check();


?>