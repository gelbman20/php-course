<?php

// Models
$config = include '../src/config.php';

spl_autoload_register ( function ($class) {
  $sources = [
    "../src/Models/Connection/$class.php",
    "../src/Models/QueryBuilder/$class.php",
    "../src/Models/Flash/$class.php"
  ];
  
  foreach ($sources as $source) {
    if (file_exists($source)) {
      require_once $source;
    }
  }
});

// Controller
$db = new QueryBuilder( Connection::create($config['database']) );
$posts = $db->getAll('posts');


// Views
include "../src/Views/Index.view.php";

Flash::reset('alert');