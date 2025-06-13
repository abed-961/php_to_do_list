<?php
session_start();

require_once "../templates/bootstrap_links.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles/login_style.css">

</head>

<body>
    <?php require_once "../templates/nav_bar.php"; ?>
    <div class="d-flex justify-content-center align-items-center h-100">

        <div style="width: 100%; max-width: 400px; ">
            <div class="card shadow p-4  circle-flip " style="width: 100%; max-width: 380px;">
                <h4 class="text-center mb-4">Login to <strong>to_do_list</strong></h4>

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST" action="../actions/login.php" id="form1">
                    <div class="mb-3">
                        <label for="input_name" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" name="input" id="input_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control " name="password" id="password" required>
                    </div>
                    <div class="progress" style="margin-bottom: 10px;">
                        <div class="progress-bar" style="width: 0%;" id="pass_progress">0%</div>
                    </div>
                    <div>
                        <label style="color:red " id="msg"></label>
                    </div>


                    <input type="button" onclick="login_btn()" class="btn btn-primary w-100" value="login">

                    <div class="text-center mt-3">
                        <small>Don't have an account? <a href="register.php">Register</a></small>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- alert componnets -->
    <?php require_once "../templates/alert.php" ?>

    <script>
        const input_name = document.getElementById("input_name");
        const input_pass = document.getElementById("password");

        input_pass.addEventListener("input", () => {
            const progress_bar = document.getElementById("pass_progress");
            if (event.target.value.length <= 8) {
                value = (event.target.value.length * 100) / 8;
                progress_bar.style.width = `${value}%`;
                progress_bar.innerHTML = value + "%";
            }
        })

        function login_btn() {
            if ((input_name.value.length > 0) && input_pass.value.length >= 8) {
                input_name.classList.remove("border-danger");
                input_pass.classList.remove("border-danger");
                document.getElementById("msg").textContent = "";
                document.getElementById("form1").submit();
            } else {

                input_name.classList.add("border-danger");
                input_pass.classList.add("border-danger");
                document.getElementById("msg").textContent = "you have to insert the minimum length of characters.";
            }
        }

    </script>

</body>

</html>