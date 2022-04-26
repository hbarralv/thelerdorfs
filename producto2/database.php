<?php

$server = 'localhost:3306';
$username = 'wordpress20';
$password = 'v2agwoku4Q54ij3M';
$database = 'wordpress20';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
