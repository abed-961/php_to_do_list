<?php if (basename($_SERVER["REQUEST_URI"]) === "delete_task.php") {
    die("access denied");
}
?>

<!-- confirm delete Task modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-0 fs-5">Are you sure you want to Delete?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-danger px-4" data-bs-dismiss="modal" value="Delete" />
            </div>
        </div>
    </div>