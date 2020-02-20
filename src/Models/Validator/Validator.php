<?php

/**
 * Class Validator - validate input data
 */
class Validator {
  private $data;

  /**
   * Validator constructor.
   * @param array $data
   */
  public function __construct($data) {
    $this->data = $data;
  }

  /**
   * array data validity
   */
  public function checkData() {
    foreach ($this->data as $key => $value) {
      if($value['value'] !== null) {
        $this->data[$key]['is_valid'] = false;
      }
      
      if ($value['value']) {
        $this->data[$key]['is_valid'] = true;
      }
    }
  }

  /**
   * Fills the array with a message about the types of errors
   */
  public function createErrorMessages() {
    foreach ($this->data as $key => $value) {

      // Default Validation
      if ( !$value['is_valid'] && isset($value['is_valid']) ) {
        $this->data[$key]['error_message'] = "The input must be field.";
      }

      // Email Validation
      if ( $value['is_valid'] && $value['type'] === 'email' ) {
        if ( !filter_var($value['value'], FILTER_VALIDATE_EMAIL) ) {
          $this->data[$key]['is_valid'] = false;
          $this->data[$key]['error_message'] = "The email {$value['value']} not correct.";
        }
      }
    }
  }

  /**
   * @param string $input_name
   * @return bool|mixed
   */
  public function getErrorMessage($input_name) {
    $input_data = $this->data[$input_name];
    return $input_data['is_valid'] ? false : $input_data['error_message'];
  }

  /**
   * @return array
   */
  public function getAll() {
    return $this->data;
  }

  /**
   * @param $input_name
   * @return mixed
   */
  public function getOne($input_name) {
    return $this->data[$input_name];
  }

  /**
   * @param array $data
   * @return bool
   */
  public function getValidationStatus(array $data) {
    $status = true;
    foreach ($data as $key => $value) {
      if (!$value['is_valid']) {
        return false;
      }
    }

    return $status;
  }

  /**
   * @return array
   */
  public function resetData() {
    foreach ( $this->data as $key => $value ) {
      $this->data[$key]['is_valid'] = false;
      $this->data[$key]['value'] = null;
      $this->data[$key]['error_message'] = '';
    }

    return $this->data;
  }
}
