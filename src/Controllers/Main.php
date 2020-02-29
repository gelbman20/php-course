<?php

// Models
$config = include '../src/config.php';

use Models\Connection\Connection;
use Models\QueryBuilder\QueryBuilder;
use Models\Flash\Flash;

// Controller
$db = new QueryBuilder( Connection::create($config['database']) );
$posts = $db->getAll('posts');


// Views
include "../src/Views/Index.view.php";

Flash::reset('alert');