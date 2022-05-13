<?php

$method = $_SERVER['REQUEST_METHOD'];

function validate(&$errors, &$values, $required_fields) {
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $errors[$field] = "The {$field} field is required.";
            continue;
        }
        
        // save the value to the $values array
        $values[$field] = $_POST[$field];
    }
}