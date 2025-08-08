<?php
$title = "Todo Site";
require_once("./partials/header2.par.php");
require_once "../includes/config.session.inc.php";
require_once "../includes/autoloader.inc.php";
if (!isset($_SESSION["user_id"])) {
    header("location: ../index.php");
}
?>
<title>Todo Site</title>
<link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>
    <main>
        <nav>
            <ul>
                <li><a href="./dashboard.php">TachesApp</a></li>
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
                        <input type="text" class="form-control" name="title" id="title" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline" placeholder="" min="">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" style="font-weight: 500;" type="submit" name="create_task">Create Task</button>
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