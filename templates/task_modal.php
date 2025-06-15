<!-- Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../actions/add_task.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Task Title -->
                    <div class="mb-3">
                        <label for="taskTitle" class="form-label">Task Title</label>
                        <input type="text" class="form-control" id="taskTitle" name="title" required>
                    </div>

                    <!-- Task Description -->
                    <div class="mb-3">
                        <label for="taskDescription" class="form-label">Task Description</label>
                        <textarea class="form-control" id="taskDescription" name="description" rows="4"
                            required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </div>
        </form>
    </div>
</div>


