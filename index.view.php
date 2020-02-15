<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP course</title>
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
<div class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <a href="create.php" class="btn btn-primary">Add Post</a>
        <div class="table-responsive mt-2">
          <table class="table table-dark">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <!-- 4. Show with foreach loop -->
            <?php foreach ($posts as $post): ?>
              <tr>
                <th scope="row"><?= $post['id'] ?></th>
                <td>
                  <a href="show.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                </td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="edit.php?id=<?= $post['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
