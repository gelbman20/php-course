<?php

session_start();

// Controller
//include "../src/Controllers/Main.php";

// include "../src/Controllers/Create.php";

include "../src/Models/Validator/Validator.php";

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

// Data and Session for View
$data = $validator->getAll();

$_SESSION['name'] = $validator->getErrorMessage('name');
$_SESSION['email'] = $validator->getErrorMessage('email');
$_SESSION['title'] = $validator->getErrorMessage('title');
$_SESSION['text'] = $validator->getErrorMessage('text');

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exam module 1</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="./">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
              aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<div class="section p-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-10">
        <h2 class="mb-4">New Post</h2>
        <form action="index.php" method="POST">
          <div class="row">
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control <?= $_SESSION['name'] ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= $data['name']['value'] ?>" placeholder="Name">
                <div class="invalid-feedback"><?= $_SESSION['name'] ?></div>
              </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control <?= $_SESSION['email'] ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $data['email']['value'] ?>" placeholder="Enter email">
                <div class="invalid-feedback"><?= $_SESSION['email'] ?></div>
              </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control <?= $_SESSION['title'] ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= $data['title']['value'] ?>" placeholder="Post Title">
                <div class="invalid-feedback"><?= $_SESSION['title'] ?></div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="form-group">
                <textarea class="form-control <?= $_SESSION['text'] ? 'is-invalid' : '' ?>" id="textarea" name="text" rows="3" placeholder="Your text"><?= $data['text']['value'] ?></textarea>
                <div class="invalid-feedback"><?= $_SESSION['text'] ?></div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>

