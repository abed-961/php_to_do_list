<?php

session_start();
if (!isset($_SESSION["loggedIn"])) {
    header("Location: ../pages/login.php");
    exit();
}

require_once "../templates/connection.php";
$user_id = $_SESSION["user"];
$sql = "SELECT id, user_id, is_completed,title , description ,  DATE_FORMAT(date_created, '%Y-%m-%d') AS date_created
FROM todo_list
WHERE user_id = :u
";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":u", $user_id, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $e) {
    $_SESSION["error"] = "there is an error in database please try again later ";
}

$_SESSION["user_tasks"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
header("Location: ../pages/dashboard.php");
exit();