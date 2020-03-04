<?php

namespace Controllers\Home;

use League\Plates\Engine;
use Models\Connection\Connection;
use Models\QueryBuilder\QueryBuilder;

class Home {
  private $config;
  private $db;
  private $posts;
  private $templates;
  
  public function __construct($config) {
    $this->config = $config;
    $this->db = new QueryBuilder( Connection::create($config['database']) );
    $this->templates = new Engine('../src/Views');
  }
  
  public function show() {
    $this->posts = $this->db->getAll('posts');
    $template_data = [
      'posts' => $this->posts,
      'flash' => $flash ?? false
    ];
    echo $this->templates->render('Index.view', $template_data);
  
    if(isset($flash)) {
      $flash->clear();
    }
  }
}