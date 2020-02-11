<?php

class Validation {

  public function setSession($session_var, $validateText) {
    if(!isset($_SESSION[$session_var])) {
      $_SESSION[$session_var] = $validateText;
    }
  }

  public function validateDefault($input, $session_var, $validateText = "Поле должно быть заполнено") {
    if(empty($input)) {
      $this->setSession($session_var, $validateText);
      return true;
    }

    return false;
  }

  public function validateEmailCorrect($email, $session_var) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->setSession($session_var, "E-mail адрес '$email' указан неверно");
      return true;
    }

    return false;
  }

  public function validatePasswordMatch($password, $password_confirmation, $session_var, $validateText = "Порали не совпадают") {
    if($password !== $password_confirmation) {
      $this->setSession($session_var, $validateText);
      return true;
    }

    return false;
  }
}