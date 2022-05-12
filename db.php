<?php

$host = 'localhost';
$dbname = 'shop';
$user = 'root';
$password = '';

// connect to db with PDO
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
