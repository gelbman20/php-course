## Usage
`include Flash.php`

## Simple Example

```php
Flash::create('alert', "The post has been successfully created");

Flash::reset('alert');
```

## Methods

| Method  | Parameter | Description | Example |
| ------------- | -- | ------------- | ------------- |
| create()  | $name, $value  | set Session with the name and message  | `Flash::create('title', "Hello World")` | 
| reset()  | $name  | reset Session by the name  | `Flash::reset('title')` | 