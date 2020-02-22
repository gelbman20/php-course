<?php

/**
 * Class Router - inbound URI router
 */
class Router {

  private $routes;
  private $route;
  private $page_not_found;

  /**
   * Create Routes URI and Path
   * 
   * @param array $routes
   * @param string $page_not_found
   * 
   * @return $this
   */
  public function __construct(array $routes, string $page_not_found) {
    $this->routes = $routes;
    $this->route = $_SERVER['REQUEST_URI'];
    $this->page_not_found = $page_not_found;

    return $this;
  }

  /**
   * Return View
   * 
   * @return $this
   */
  public function start() {
    if ( array_key_exists($this->route, $this->routes) ) {
      include $this->routes[$this->route];
    } else {
      include $this->page_not_found;
    }

    return $this;
  }
}