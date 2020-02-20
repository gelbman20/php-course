<?php

session_start();

include '../src/Models/Router/Router.php';

$routes = [
  "/" => "../src/Controllers/Main.php",
  "/create" => "../src/Controllers/Create.php",
  "/create.php" => "../src/Controllers/Create.php",
];

$router = new Router($routes);
$router->start();
