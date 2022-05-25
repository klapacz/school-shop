<?php

function get_db () {
    $host = isset($_ENV["DB_HOST"]) ? $_ENV["DB_HOST"] : 'localhost';
    $dbname = isset($_ENV["DB_NAME"]) ? $_ENV["DB_NAME"] : 'shop';
    $user = isset($_ENV["DB_USER"]) ? $_ENV["DB_USER"] : 'root';
    $password = isset($_ENV["DB_PASSWORD"]) ? $_ENV["DB_PASSWORD"] : '';

    // connect to db with PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    return $db;
}

$db = get_db();