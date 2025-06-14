<?php
session_start();
require_once "../templates/bootstrap_links.php";


$username = $_SESSION["register_info"] ? $_SESSION["register_info"]["username"] : "";
$email = $_SESSION["register_info"] ? $_SESSION["register_info"]["email"] : "";
$country = $_SESSION["register_info"] ? $_SESSION["register_info"]["country"] : "";
$age = $_SESSION["register_info"] ? $_SESSION["register_info"]["age"] : "";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

</head>

<body class="bg-light">
    <?php require_once "../templates/nav_bar.php";
    require_once "../templates/alert.php";
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create an Account</h4>
                    </div>
                    <div class="card-body">



                        <form action="../actions/register.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="<?= $username ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select name="country" id="country" class="form-select" value="<?= $country ?>"
                                    required>
                                    <option value="" disabled<?= !$country ? "selected" : "" ?>>Select your country
                                    </option>
                                    <option value="USA">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Germany">Germany</option>
                                    <option value="France">France</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="India">India</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" name="age" id="age" class="form-control" min="1"
                                    value="<?= $age ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Register</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require_once '../templates/footer.php';
    unset($_SESSION["register_info"]) ?>
</body>

</html>