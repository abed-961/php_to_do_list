<?php session_start();

if (!isset($_SESSION["loggedIn"])) {
    header("Location: ../pages/login.php");
    exit();
}
if (!isset($_SESSION["user_tasks"])) {
    header("Location: ../actions/get_task.php");
    exit();
}

$tasks = $_SESSION["user_tasks"];
$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .border-outline:focus {
            outline: none;
        }
    </style>
    <?php require_once "../templates/bootstrap_links.php"; ?>
</head>

<body>
    <?php require_once "../templates/nav_bar.php"; ?>

    <!-- to do list task container -->
    <div class="container todo-container">
        <h3 class="text-center mb-4">Welcome, <strong><?= $user["username"] ?></strong> – Your Tasks</h3>

        <div class="card ">
            <div class="card-body" style="overflow-y:scroll ; height: 70vh;">
                <!-- Button to trigger modal -->
                <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#addTaskModal"
                    style="position:sticky ; top : 0 ; left:40% ; z-index: 99;">
                    Add New Task
                </button>
                <ul class="list-group">

                    <!-- Task 1 -->
                    <?php foreach ($tasks as $task): ?>

                        <li class="list-group-item mb-3 border">
                            <form action="../actions/update_task.php" method="post">
                                <input type="text" hidden name="id" value="<?= $task["id"] ?>">
                                <div class="mb-1">
                                    <strong><textarea readonly name="title" class="w-100 border-outline"
                                            style="border:none; background:transparent"><?= $task["title"] ?></textarea></strong>
                                    <p>
                                        <textarea readonly class="text-secondary w-100 border-outline" name="description"
                                            style="border:none; background:transparent"><?= $task["description"] ?></textarea>
                                    </p>
                                    <small class="text-secondary"><?= $task["date_created"] ?></small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <form action="../actions/update_task.php" method="post" name="form1">
                                        <div class="d-flex">

                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" onchange="submit()"
                                                    name="task1" id="task1-complete" value="complete"
                                                    <?= $task["is_completed"] ? "checked" : "" ?>>
                                                <label class="form-check-label" for="task1-complete">Completed</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" onchange="submit()"
                                                    name="task1" id="task1-no" value="no" <?= !$task["is_completed"] ? "checked" : "" ?>>
                                                <label class="form-check-label" for="task1-no">No</label>
                                            </div>

                                        </div>


                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#DeleteModal">
                                            Delete
                                        </button>
                                </div>
                            </form>
                            <form action="../actions/delete_task.php" method="post">
                                <input type="text" hidden name="id" value="<?= $task["id"] ?>">
                                <?php require "../templates/delete_task.php"; ?>
                            </form>

                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>
        </div>

    </div>
    </div>




    <!-- task modal  -->
    <?php require_once "../templates/task_modal.php";
    // <!-- alert templates -->
    require_once "../templates/alert.php";
    // <!-- footer templates -->
    require_once "../templates/footer.php";

    unset($_SESSION["user_tasks"]);
    ?>


</body>

</html>r