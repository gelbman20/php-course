<?php

// Создать методы на просто проверку поля и email
// И создать для сесий feedback

class Validator {
  private $data;
  
  public function __construct($data) {
    $this->data = $data;
  }
  
  public function check() {
    foreach ($this->data as $key => $value) {
      $this->data[$key]['is_valid'] = false;
      
      if ($value['value']) {
        $this->data[$key]['is_valid'] = true;
      }
    }
    
    var_dump($this->data);
  }
}
