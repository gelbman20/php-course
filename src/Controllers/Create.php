<?php

// Models
$config = include '../src/config.php';

use Models\Connection\Connection;
use Models\QueryBuilder\QueryBuilder;
use Models\Validator\Validator;
use Models\Flash\Flash;

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

    $data = [
      'name' => $name->getValue(),
      'email' => $email->getValue(),
      'title' => $title->getValue(),
      'text' => $text->getValue(),
      'time' => date("Y-m-d H:i:s")
    ];
    
    $db = new QueryBuilder(Connection::create($config['database']));

    $db->create('posts', $data);

    Flash::create('alert', "The post has been successfully created");

    $_SESSION['name'] = false;
    $_SESSION['email'] = false;
    $_SESSION['title'] = false;
    $_SESSION['text'] = false;

    header("Location: /");
  }

  $_SESSION['name'] = $name->getError();
  $_SESSION['email'] = $email->getError();
  $_SESSION['title'] = $title->getError();
  $_SESSION['text'] = $text->getError();
}

// Views
include "../src/Views/Create.view.php";