<?php

namespace Models\Validator;

/**
 * Validation
 * 
 * @author Andrii Helever <gelbman20@gmail.com>
 * @link https://github.com/gelbman20/php-course/tree/develop/src/Models/Validator
 */

class Validator {

  private $name;
  private $value;

  /**
   * Field name and value
   * 
   * @param string $name
   * @param string $value
   */
  function __construct(string $name, $value) {
    $this->name = $name;
    $this->value = $value;
  }

  /**
   * Field is required
   * 
   * return $this
   */
  public function required() {
    if($this->value == '' || $this->value == null) {
      $this->error = "Field {$this->name} is required";
    }

    return $this;
  }

  /**
   * Check input is an error
   * 
   * @return boolean
   */
  public function isSuccess() {
    if(isset($this->error)) return false;

    return true;
  }

  /**
   * Get an error
   * 
   * @return mixed
   */
  public function getError() {
    if(!$this->isSuccess()) return $this->error;
    return false;
  }


  /**
   * Check is Email
   * 
   * @return $this
   * 
   */
  public function isEmail() {

    if($this->error) return $this;
    
    
    if (filter_var($this->value, FILTER_VALIDATE_EMAIL)) return $this;
    $this->error = "Field {$this->value} is not email format";

    return $this;
  }

  /**
   * Get Input Name
   * 
   * @return $name
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Get Input Value
   * 
   * @return $value
   */
  public function getValue() {
    return $this->value;
  }
}
