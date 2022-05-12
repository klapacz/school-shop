<?php

$host = 'localhost';
// TODO: change this name XD
$dbname = 'klefshop';
$user = 'root';
$password = '';

// connect to db with PDO
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
