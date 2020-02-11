<?php

include_once "database.php";

// Get Form Data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Create DB connection
$database = new Database();

// Add new User
$database->addUser($name, $email, $password_hash);


