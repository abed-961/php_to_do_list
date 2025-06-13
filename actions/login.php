<?php
session_start();
require "../templates/connection.php";

function return_error($msg) // function to return error ;
{
    $_SESSION["error"] = $msg;
    header("Location: ../pages/login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") { // check the request Method
    return_error("invalid method Request");
}

$input = htmlspecialchars(trim($_POST["input"]));
$password = htmlspecialchars(trim($_POST["password"])); // the store the input in variables

if (empty($input) || empty($password)) { // check if any input is empty
    return_error("all fields are required ");
}


try {//starting the query 
    $sql = "SELECT * FROM users WHERE username = :input OR email = :input AND is_deleted = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":input", $input, PDO::PARAM_STR);
    $stmt->bindParam(":input", $input, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    return_error("server time out . \n try again later");
}


if (!password_verify($password, $user["password"])) { // check if the password are correct 
    return_error("password incorrect");
}


$_SESSION["user"] = $user;
$_SESSION["loggedIn"] = true;

header("Location: ../pages/dashboard.php"); // go to the main page
exit();


