<?php

if( !session_id() ) @session_start();

require "../vendor/autoload.php";

$config = include '../src/config.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
  $r->addRoute('GET', '/', [ 'Controllers\Home\Home', 'show']);
  $r->addRoute('GET', '/create', [ 'Controllers\Create\Create', 'show']);
  $r->addRoute('POST', '/create', [ 'Controllers\Create\Create', 'create']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
  $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
  case FastRoute\Dispatcher::NOT_FOUND:
    $page = new Controllers\PageNotFound\PageNotFound();
    $page->show($uri);
    break;
  case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    $allowedMethods = $routeInfo[1];
    $page = new Controllers\PageNotFound\PageNotFound();
    $page->show($uri);
    break;
  case FastRoute\Dispatcher::FOUND:
    $handler = $routeInfo[1];
    $vars = $routeInfo[2];
    $controller = new $handler[0]($config);
    call_user_func([$controller, $handler[1]]);
    break;
}