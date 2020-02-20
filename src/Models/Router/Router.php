<?php

class Router {

  private $routes;
  private $route;

  public function __construct($routes) {
    $this->routes = $routes;
    $this->route = $_SERVER['REQUEST_URI'];
  }

  public function start() {
    if ( array_key_exists($this->route, $this->routes) ) {
      include $this->routes[$this->route];
    } else {
      include '../src/Views/ErrorPage.view.php';
    }
  }
}