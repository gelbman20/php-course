<?php

// Models
$config = include '../src/config.php';
include "../src/Models/Connection/Connection.php";
include "../src/Models/QueryBuilder/QueryBuilder.php";
include "../src/Models/Validator/Validator.php";
include "../src/Models/Flash/Flash.php";

// Controller
if($_POST['name'] !== null && $_POST['email'] !== null && $_POST['title'] !== null && $_POST['text'] !== null ) {
  $name = new Validator('name', $_POST['name']);
  $name->required();

  $email = new Validator('email', $_POST['email']);
  $email->required()->isEmail();

  $title = new Validator('title', $_POST['title']);
  $title->required();

  $text = new Validator('text', $_POST['text']);
  $text->required();

  if ($name->isSuccess() && $email->isSuccess() && $title->isSuccess() && $text->isSuccess()) {
    header("Location: /");
    exit;
  }

  $_SESSION['name'] = $name->getError();
  $_SESSION['email'] = $email->getError();
  $_SESSION['title'] = $title->getError();
  $_SESSION['text'] = $text->getError();
}

// Views
include "../src/Views/Create.view.php";