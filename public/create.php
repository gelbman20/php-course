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
        <form action="create.php" method="POST">
          <div class="row">
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="email" class="form-control is-invalid" id="email" name="email" placeholder="Enter email">
                <div class="invalid-feedback">Sorry, that email's taken. Try another?</div>
              </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="form-group">
                <textarea class="form-control" id="textarea" name="text" rows="3" placeholder="Your text"></textarea>
                <div class="invalid-feedback"></div>
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
