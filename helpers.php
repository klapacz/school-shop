<?php

session_start();

$method = $_SERVER['REQUEST_METHOD'];

$errors = [];
$values = [];

function validate(&$errors, &$values, $required_fields) {
    // iterate over required fields and check if are not empty
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $errors[$field] = "The {$field} field is required.";
            continue;
        }
        
        // save the value to the $values array
        $values[$field] = $_POST[$field];
    }
}

function login($user) {
    $_SESSION['user'] = $user;
    header('Location: /');
}

function logout() {
    unset($_SESSION['user']);
    header('Location: /auth/login.php');
}

// fallback user to false
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;