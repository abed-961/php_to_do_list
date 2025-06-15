<?php
session_start();
require "../templates/connection.php";


$user_id = $_SESSION["user"]["id"];

function return_error($msg) // function to return error ;
{
    $_SESSION["login_info"] = ["title" => trim($_POST["title"]), "description" => trim($_POST["description"])];
    $_SESSION["error"] = $msg;
    header("Location: ../pages/dashboard.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") { // check the request Method
    return_error("invalid method Request");
}

$title = htmlspecialchars(trim($_POST["title"]));
$description = htmlspecialchars(trim($_POST["description"])); // the store the title in variables

if (empty($title) || empty($description)) { // check if any title is empty
    return_error("all fields are required ");
}


try {//starting the query 
    $sql = "INSERT INTO todo_list (title , description , user_id ) VALUES (:t , :d , :u )";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":t", $title, PDO::PARAM_STR);
    $stmt->bindParam(":d", $description, PDO::PARAM_STR);
    $stmt->bindParam(":u", $user_id, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $e) {
    return_error("server time out . <br /> try again later");
}







$_SESSION["success"] = "task added succefully";
header("Location: ../pages/dashboard.php"); // go to the main page
exit();



