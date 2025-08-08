<?php
$title = "Todo Site";
require_once("../pages/partials/header2.par.php");
require_once "../includes/config.session.inc.php";
require_once "../includes/autoloader.inc.php";
if (!isset($_SESSION["user_id"])) {
    header("location: ../index.php");
}
$view = new TaskView();

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
        <div class="container">
            <h2>Welcome to the dashboard</h2>
            <?php 
             $view->dashboard($_SESSION["user_id"]);

            ?>

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
    <script src="./assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="./assets/Vendor/fontawesome/js/all.min.js"></script>
    <script>
    </script>
</body>

</html>