<?php
// Example session variables (set these properly in your real login system)
if (session_status() == PHP_SESSION_NONE)
    session_start();
// $isLoggedIn = isset($_SESSION['user']);  // true if logged in
// $userRole = $isLoggedIn ? $_SESSION['user']['role'] : null;  // e.g. 'admin' or 'user'

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

                <?php if ($isLoggedIn && $userRole === 'admin'): ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="/admin.php">Admin</a>
                    </li>
                <?php endif; ?>

                <?php if (!$isLoggedIn): ?>
                    <li class="nav-item">
                        <a class="btn btn-light text-primary" href="/login.php">Login</a>
                    </li>

                <?php else: ?>
                    <li class="nav-item">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            Logout
                        </button>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="btn btn-warning text-dark" href="/register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Logout Confirmation Modal
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
                <a href="/logout.php" class="btn btn-danger px-4">Logout</a>
            </div>
        </div>
    </div> -->
</div>