<?php

function dd($data) {
 echo "<pre>";
 var_dump($data);
 echo "</pre>";
 die();
}

class Connection {
  public static function make() {
    return new PDO( 'mysql:host=localhost;dbname=lesson01', 'root', '' );
  }
}

class QueryBuilder {
  
  public $db = null;
  
  public function __construct($pdo) {
    $this->db = $pdo;
  }
  
  public function select($table) {
    $statement = $this->db->prepare( "SELECT * FROM $table" );
    $statement->execute();
    return $statement->fetchAll( PDO::FETCH_ASSOC );
  }
}

$db = new QueryBuilder(Connection::make());

$users = $db->select('users');
$posts = $db->select('posts');

dd([$users, $posts]);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP course</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<header class="pt-5 pb-5">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Home</a>
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
    </nav>
  </div>
</header>
</body>
</html>
