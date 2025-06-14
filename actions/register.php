<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    return_error("invalid method request !");
}


function return_error($msg) // function to return error ;
{
    $_SESSION["error"] = $msg;
    $_SESSION["register_info"] = ["username" => $_POST["username"], "email" => $_POST["email"], "country" => $_POST["country"], "age" => $_POST["age"]];
    header("Location: ../pages/register.php");
    exit();


}

require_once "../templates/connection.php";

$username = htmlspecialchars(trim($_POST["username"]));
$password = htmlspecialchars(trim($_POST["password"]));
$email = htmlspecialchars(trim($_POST["email"]));
$confirm_password = htmlspecialchars(trim($_POST["confirm_password"]));
$age = htmlspecialchars(trim($_POST["age"]));
$country = htmlspecialchars(trim($_POST["country"]));

if (empty($username) || empty($password) || empty($email) || empty($confirm_password) || empty($age) || empty($country)) {
    return_error("all fields are required ");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return_error("invalid type of email");
}
if ($age < 18) {
    return_error("you have be grow then $age ! At least 18 .");
}
if (!preg_match("/[\W]/", $password)) {
    return_error("the password must have a special chars ");
}


if (strlen($password) < 8) {
    return_error("the password must be 8 characters or more");
}

if ($password !== $confirm_password) {
    return_error("the passwords are not macth");
}

$country_arr = [
    "USA",
    "UK",
    "CA",
    "DE",
    "FR",
    "EG",
    "IN",
    "MA",
    "SA",
    "OT",
];

if (!in_array($country, $country_arr)) {
    return_error("invalid country inserted");
}



$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    $sql = "INSERT INTO users (username , email , age ,  country , password ) VALUES (:u , :e , :a , :c ,:p)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":u", $username, PDO::PARAM_STR);
    $stmt->bindParam(":e", $email, PDO::PARAM_STR);
    $stmt->bindParam(":p", $hashed_password, PDO::PARAM_STR);
    $stmt->bindParam(":a", $age, PDO::PARAM_INT);
    $stmt->bindParam(":c", $country, PDO::PARAM_STR);
    $stmt->execute();

} catch (PDOException $e) {
    return_error("there is an error in server please refresh the page and try again . ");
}

$_SESSION["success"] = "account registered succefully";
header("Location: ../pages/register.php");
exit();