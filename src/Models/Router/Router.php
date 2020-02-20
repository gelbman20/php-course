<?php

/**
 * Class Router - inbound URI router
 */
class Router {

  private $routes;
  private $route;

  /**
   * Router constructor.
   * @param array $routes
   */
  public function __construct($routes) {
    $this->routes = $routes;
    $this->route = $_SERVER['REQUEST_URI'];
  }

  /**
   * Init
   */
  public function start() {
    if ( array_key_exists($this->route, $this->routes) ) {
      include $this->routes[$this->route];
    } else {
      include '../src/Views/ErrorPage.view.php';
    }
  }
}