<?php

session_start();

require "../vendor/autoload.php";

use Models\Router\Router;

$routes = [
  "/" => "../src/Controllers/Main.php",
  "/create" => "../src/Controllers/Create.php",
  "/create.php" => "../src/Controllers/Create.php",
];
$page_not_found = '../src/Views/ErrorPage.view.php';

$router = new Router($routes, $page_not_found);
$router->start();