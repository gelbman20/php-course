## Usage
`include Validator.php`

## Simple Example

```php
$email = new Validator('email', $_POST['email']);
$email->required()->isEmail();

if($email->isSuccess()) {
  ...
} else {
  var_dump($email->getError());
}
```

## Methods

| Method  | Parameter | Description | Example |
| ------------- | -- | ------------- | ------------- |
| required  |   | return error if input is empty  | `required()` | 
| isEmail  |   | return error if input is not email  | `isEmail()`  |
| isSuccess  |   | return true if we don't has an error  | `isSuccess()`  |
| getError  |   | return error if we has an error  | `getError()`  |
