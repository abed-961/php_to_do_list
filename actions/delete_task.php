<?php

session_start();

if (!isset($_SESSION["loggedIn"])) {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["error"] = "invalid method request";
    header("Location: ../pages/dashboard.php");
    exit();
}


$user = $_SESSION["user"];
$id = $_POST["id"];

require_once "../templates/connection.php";
try {
    $sql = "DELETE FROM todo_list WHERE user_id = :u AND id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":u", $user["id"], PDO::PARAM_INT);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $e) {
    $_SESSION["error"] = "there are an error in data base please try again later";
    header("Location: ../pages/dashboard.php");
    exit();
}

$_SESSION["success"] = "task deleted succefuly";
header("Location: ./get_task.php");
exit();