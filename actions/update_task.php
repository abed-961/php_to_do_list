<?php

session_start();

if (!isset($_SESSION["loggedIn"])) {
    header("Location: ../pages/login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../pages/dashboard.php");
    exit();
}

require_once "../templates/connection.php";

$user_id = $_SESSION["user"]["id"];
$id = $_POST["id"];

try {
    $sql = "SELECT is_completed FROM todo_list WHERE user_id = :u AND id=:id  ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":u", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $is_completed = $stmt->fetch(PDO::FETCH_ASSOC);
    $new_completed_stmt = !$is_completed["is_completed"];


    $sql2 = "UPDATE todo_list SET is_completed = :n WHERE user_id = :u AND id=:id";
    $stmt1 = $pdo->prepare($sql2);
    $stmt1->bindParam(":n", $new_completed_stmt, PDO::PARAM_BOOL);
    $stmt1->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt1->bindParam(":u", $user_id, PDO::PARAM_INT);
    $stmt1->execute();
} catch (PDOException $e) {
    $_SESSION["error"] = $e->getMessage();
    header("Location: ../pages/dashboard.php");
    exit();
}

$_SESSION["success"] = "task updated succesfully";
header("Location: ../pages/dashboard.php");
exit();