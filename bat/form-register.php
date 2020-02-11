<?php
session_start();

include_once "database.php";
include_once "validation.php";

// Get Form Data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Add Validation
$validation = new Validation();

// Validate Inputs
$validate_name = $validation->validateDefault($name, 'register_name');
$validate_email = $validation->validateDefault($email, 'register_email');
$validate_email_correct = $validation->validateEmailCorrect($email, 'register_email_correct');
$validate_password = $validation->validateDefault($password, 'register_password');
$validate_password_confirm = $validation->validateDefault($password_confirmation, 'register_password_confirm');
$validate_password_match = $validation->validatePasswordMatch($password, $password_confirmation, 'register_password_match');

if ( $validate_name || $validate_email || $validate_email_correct || $validate_password || $validate_password_confirm || $validate_password_match) {
  header( "Location: ../register.php" );
  exit();
}

// Create DB connection
$database = new Database();

// Add new User
$new_user = $database->addUser($name, $email, $password_hash);

if ($new_user) {
  echo "<h1>Пользователь успешно добавлен</h1>";
} else {
  echo "<h1>Пользователь есть в базе</h1>";
}


