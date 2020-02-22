## Usage
`include Connection.php`

## Simple Example
```php
$database = [
    "host" => "localhost",
    "database" => "exampleName",
    "username" => "root",
    "password" => "",
    "charset" => "utf8",
    "connection" => "mysql:host"
  ];
Connection::create($database);
```

## Methods
| Method | Parameter | Description | Example |
| -- | -- | -- | -- |
| create | $config | return PDO connection | `Connection::create($database)`