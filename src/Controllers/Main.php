<?php

// Models
$config = include '../src/config.php';
include '../src/Models/Connection/Connection.php';
include '../src/Models/QueryBuilder/QueryBuilder.php';
include '../src/Models/Flash/Flash.php';


$db = new QueryBuilder( Connection::create($config['database']) );
$posts = $db->getAll('posts');


// Views
include "../src/Views/Index.view.php";

Flash::reset('alert');