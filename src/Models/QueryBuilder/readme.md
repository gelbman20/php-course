## Usage
`include Connection.php`
<br>
`include QueryBuilder.php`


## Simple Example

```php
// Data from global variable POST
// or your 
$title = $_POST["title"];
$id = $_GET['id'];

$database = [
    "host" => "localhost",
    "database" => "module01",
    "username" => "root",
    "password" => "",
    "charset" => "utf8",
    "connection" => "mysql:host"
  ];

$db = new QueryBuilder(Connection::create($database));

// Get All Rows from Table - Posts
$posts = $db->getAll('posts');

// Get the Row from Table - Posts
$post = $db->getOne('posts', $id);

// Add new Row in Table Posts
$db->create('posts', [
  "title" => $title
]);

// Update Row data in Table Posts
$db->update('posts', $_POST, $id);

// Delete Row from Table Posts
$db->delete('posts', $id);
```

## Methods

| Method  | Parameter | Description | Example |
| ------------- | -- | ------------- | ------------- |
| __construct  | $pdo  | create PDO Connection  | `new QueryBuilder(PDO)` | 
| getOne  | $table, $id  | return one row by id in the table  | `getOne('posts', 10)` | 
| getAll  | $table  | return all rows from the table  | `getAll('posts')`  |
| create  | $table, $data  | add new row in the table  | `create('posts', ["title" => "Hello World"])`  |
| update  | $table, $data, $id  | change the row in the table | `update('posts', ["title" => "Change the World"], 10)`  |
| delete  | $table, $id  | remove row in the table | `delete('posts', 10)`  |
