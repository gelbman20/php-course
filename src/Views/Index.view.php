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
    <?php if( $_SESSION['alert'] ): ?>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span> <?= $_SESSION['alert'] ?> </span>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="row">
      <?php foreach ( $posts as $post ): ?>
        <?php
        $name = $post[ 'name' ];
        $email = $post[ 'email' ];
        $title = $post[ 'title' ];
        $text = $post[ 'text' ];
        $time = $post[ 'time' ];
        ?>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card mb-3">
            <h3 class="card-header"><?= $title ?></h3>
            <div class="card-body">
              <h5 class="card-title"><?= $name ?></h5>
              <h6 class="card-subtitle text-muted"><?= $email ?></h6>
            </div>
            <div class="card-body">
              <p class="card-text"><?= $text ?></p>
            </div>
            <div class="card-footer text-muted"><?= $time ?></div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="col-12 mt-2">
        <a href="/create" type="button" class="btn btn-success">New Post</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>