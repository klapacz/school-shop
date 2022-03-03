<?php

header('Content-Type: application/json');

$string = fn($value) => is_string($value);

$user_schema = [
    'id' => [true, $string],
    'email' => [true, $string],
    'password' => [true, $string],
    'first_name' => [true, $string],
    'last_name' => [true, $string],
    'role' => [true, $string],
];

function is_valid ($schema, $data) {
    foreach ($schema as $key => $validators) {
        $is_required = array_shift($validators);
        if ($is_required && !isset($data[$key])) return false;

        foreach ($validators as $validator) {
            if (!$validator($data[$key])) return false;
        }
    }

    return true;
}

$add = function ($q) use ($user_schema) {
    $values = (array) json_decode(file_get_contents('php://input'));
    if(!is_valid($user_schema, $values)) return;
    print_r($values);
};

function run($func) {
    $q = mysqli_connect('localhost', 'root', '', 'klefshop');
    $func($q);

    mysqli_close($q);
    exit();
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST': run($add);
}