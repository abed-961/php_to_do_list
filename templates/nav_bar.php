<?php

if (basename($_SERVER["REQUEST_URI"]) === "nav_bar.php") {
    die("access denied");
}

// Example session variables (set these properly in your real login system)
if (session_status() == PHP_SESSION_NONE)
    session_start();

$userRole = isset($_SESSION["loggedIn"]) ? $_SESSION['user']['role'] : null;  // e.g. 'admin' or 'user'

require_once "bootstrap_links.php";


// $isLoggedIn = isset($_SESSION['user']);
// $userRole = $isLoggedIn ? $_SESSION['user']['role'] : null;
?>

<!-- Bootstrap 5 Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">📝 to_do_list</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center gap-2">

                <?php if (isset($_SESSION["loggedIn"]) && $userRole === 'admin'): ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="/admin.php">Admin</a>
                    </li>
                <?php endif; ?>

                <?php if (!isset($_SESSION["loggedIn"])): ?>

                    <?php if (basename($_SERVER['REQUEST_URI']) !== "login.php"): ?>
                        <li class="nav-item">
                            <a class="btn btn-light text-primary" href="../pages/login.php">Login</a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            Logout
                        </button>
                    </li>
                <?php endif;
                if (basename($_SERVER["REQUEST_URI"]) !== "register.php"):
                    ?>

                    <li class="nav-item">
                        <a class="btn btn-warning text-dark" href="../pages/register.php">Register</a>
                    </li>
                <?php endif;
                if (isset($_SESSION["loggedIn"])):
                    if (basename($_SERVER["REQUEST_URI"]) !== "dashboard.php"): ?>
                        <li class="nav-item">
                            <a href="../pages/dashboard.php" class="btn btn-secondary">Dashboard</a>
                        </li>
                    <?php endif;
                endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-0 fs-5">Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                <a onclick='window.location.href ="../actions/logout.php"' class="btn btn-danger px-4"
                    data-bs-dismiss="modal">Logout</a>
            </div>
        </div>
    </div>
</div>