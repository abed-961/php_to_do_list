<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = "root";
$password = "";
$database = "to_do_list";
$host = "localhost";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
} catch (PDOException $error) {
    die("there are an error in server connection please try again later .");
}