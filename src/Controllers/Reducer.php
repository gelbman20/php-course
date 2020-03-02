<?php

namespace Controllers;

class Reducer {
  public function home() {
    include '../src/Controllers/Main.php';
  }
  
  public function create() {
    include '../src/Controllers/Create.php';
  }
}