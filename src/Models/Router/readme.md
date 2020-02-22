## Usage
`include Router.php`

## Simple Example
```php
$routes = [
  "/" => "Views/index.view.php",
  "/create" => "Views/create.view.php",
  "/edit" => "Views/create.view.php"
];
$page_not_found = 'Views/pageNotFound.view.php';

$router = new Router($routes, $page_not_found);
$router->start();
```

## Methods
| Method | Parameter | Description | Example |
| -- | -- | -- | -- |
| __construct | $routes, $page_not_found | return Router with URI and Path | `new Router($routes, $page_not_found)`
| start |  | include exist path and return Router | `start()`