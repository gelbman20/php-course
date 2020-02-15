<?php
include "functions.php";
$db = include "database/start.php";

$id = $_GET['id'];
$post = $db->getOne('posts', $id);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Post</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="pb-5">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">My Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
              aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<div class="section p-3">
  <div class="container">
    <form class="form-inline align-items-end" action="./update.php?id=<?= $post['id'] ?>" method="POST">
      <div class="form-group">
        <label class="sr-only" for="title">Name</label>
        <input id="title" placeholder="Title" value="<?= $post['title'] ?>" type="text" name="title" class="form-control">
      </div>
      
      <button type="submit" class="btn btn-warning">Edit Post</button>
    </form>
  </div>
</div>
</body>
</html>