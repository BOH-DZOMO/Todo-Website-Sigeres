<?php
$title = "Todo Site";
require_once("./partials/header2.par.php");
require_once "../includes/config.session.inc.php";
require_once "../includes/autoloader.inc.php";
if (!isset($_SESSION["user_id"])) {
    header("location: ../index.php");
}
$data = null;
if (isset($_POST["task_id"])) {
    $old_data = new TaskView();
    $data = $old_data->read($_POST["task_id"]);
}
?>
<title>Todo Site</title>
<link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>
    <main>
        <nav>
            <ul>
                <li><a href="">TachesApp</a></li>
                <li><a href="./create_task.php" class="links">Create Tasks</a></li>
                <li><a href="./list.php" class="links">List Tasks</a></li>
                <li><a href="../includes/logout.inc.php" class="links">Log Out</a></li>
            </ul>
        </nav>
        <div class="card-container">
            <div class="task-card">
                <h4>Create a new Task</h4>
                <form action="../includes/task.inc.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="" value="<?php echo $data[0]['title'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?php echo $data[0]["description"]?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline" placeholder="" value="<?php echo $data[0]["due_date"]?>">
                    </div>
                    <input type="hidden" name="task_id" value="<?php echo $data[0]["id"]?>">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" style="font-weight: 500;" type="submit" name="edit_task">Edit Task</button>
                    </div>
                </form>
            </div>

        </div>
        <footer>
            <div class="icon-tray">
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
            </div>
            <p><span>@</span> 2025 TachesApp. Tous droits reserves.</p>
        </footer>
    </main>
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="../assets/Vendor/fontawesome/js/all.min.js"></script>
    <script>
    </script>
</body>

</html>