<?php

// Models
$config = include '../src/config.php';

use League\Plates\Engine;
use Models\Connection\Connection;
use Models\QueryBuilder\QueryBuilder;
use Models\Flash\Flash;

// Controller
$db = new QueryBuilder( Connection::create($config['database']) );
$posts = $db->getAll('posts');


// Views
$templates = new Engine('../src/Views');
echo $templates->render('Index.view', ['posts' => $posts]);

//include "../src/Views/Index.view.php";

Flash::reset('alert');