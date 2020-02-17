<?php

// Model
$config = include '../src/config.php';
include '../src/Models/Connection/Connection.php';
include '../src/Models/QueryBuilder/QueryBuilder.php';


$db = new QueryBuilder( Connection::create($config['database']) );
$posts = $db->getAll('posts');


// View
include "../src/Views/Index.view.php";