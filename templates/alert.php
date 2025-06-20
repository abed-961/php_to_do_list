<?php if (basename($_SERVER["REQUEST_URI"]) === "alert.php") {
    die("access denied");
}
?>
<div style="position:fixed; right : 10px ; bottom : 20px; width: 30vw; z-index: 99;">
    <?php if (basename($_SERVER["REQUEST_URI"]) !== "login.php"): ?>
        <?php if (isset($_SESSION["success"])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION["success"]) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION["success"]); ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php if (isset($_SESSION["error"])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION["error"]) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION["error"]); ?>
    <?php endif; ?>

</div>