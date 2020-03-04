<?php

namespace Controllers\Create;

use League\Plates\Engine;
use Models\Connection\Connection;
use Models\QueryBuilder\QueryBuilder;
use Models\Validator\Validator;
use Tamtamchik\SimpleFlash\Flash;

class Create {
  private $config;
  private $db;
  private $templates;
  
  public function __construct($config) {
    $this->config = $config;
    $this->db = new QueryBuilder( Connection::create($config['database']) );
    $this->templates = new Engine('../src/Views');
  }
  
  private function _show($data = []) {
    $templates = new Engine('../src/Views');
    echo $templates->render('Create.view', [
      "data" => $data
    ]);
  }
  
  public function show() {
    $_SESSION['name'] = false;
    $_SESSION['email'] = false;
    $_SESSION['title'] = false;
    $_SESSION['text'] = false;
    
    $this->_show();
  }
  
  public function create() {
    $name = new Validator('name', $_POST['name']);
    $name->required();

    $email = new Validator('email', $_POST['email']);
    $email->required()->isEmail();

    $title = new Validator('title', $_POST['title']);
    $title->required();

    $text = new Validator('text', $_POST['text']);
    $text->required();

    $data = [
      'name' => $name->getValue(),
      'email' => $email->getValue(),
      'title' => $title->getValue(),
      'text' => $text->getValue(),
      'time' => date("Y-m-d H:i:s")
    ];
    
    if ($name->isSuccess() && $email->isSuccess() && $title->isSuccess() && $text->isSuccess()) {
      $this->db->create('posts', $data);

      $flash = new Flash();
      $flash->message('The post has been successfully created.', 'success');

      header("Location: /");
    }

    $_SESSION['name'] = $name->getError();
    $_SESSION['email'] = $email->getError();
    $_SESSION['title'] = $title->getError();
    $_SESSION['text'] = $text->getError();
    
    
    $this->_show($data);
  }
}