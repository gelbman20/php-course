<?php

// Models
$config = include '../src/config.php';
include "../src/Models/Connection/Connection.php";
include "../src/Models/QueryBuilder/QueryBuilder.php";
include "../src/Models/Validator/Validator.php";
include "../src/Models/Flash/Flash.php";

// Controller
$data = [
  "name" => [
    "name" => "name",
    "value" => $_POST["name"],
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

// Validate Data and Create Error Messages
$validator = new Validator($data);

$validator->checkData();
$validator->createErrorMessages();

// Create Data and Session for View
$data = $validator->getAll();

$_SESSION['name'] = $validator->getErrorMessage('name');
$_SESSION['email'] = $validator->getErrorMessage('email');
$_SESSION['title'] = $validator->getErrorMessage('title');
$_SESSION['text'] = $validator->getErrorMessage('text');

// Check All Data For Sent
$data_status = $validator->getValidationStatus($data);

// Add new post
if ( $data_status ) {
  $db = new QueryBuilder( Connection::create($config['database']) );
  $db->addOne('posts', $data);
  $data = $validator->resetData();
  Flash::create('alert', 'Your post have been successfully added!');
  header("Location: /");
}

// Views
include "../src/Views/Create.view.php";