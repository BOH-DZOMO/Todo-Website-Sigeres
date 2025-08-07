<?php
require_once "../includes/config.session.inc.php";
require_once "../includes/autoloader.inc.php";
$view = new TaskView();
$title = "Todo Site";
require_once("./partials/header2.par.php");
?>
<title>Todo Site</title>
<link rel="stylesheet" href="../assets/css/list.css">
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
        <div class="container">
            <h4>List of Tasks</h4>
            <section>
                <form action="" method="post">
                    <input type="date" name="first_date" id="">
                    <input type="date" name="last_date" id="">
                    <button class="btn btn-primary" style="font-weight: 500;" type="submit" name="filter">Filter</button>
                </form>
            </section>

            <?php

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
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="../assets/Vendor/fontawesome/js/all.min.js"></script>
    <script>
    </script>
</body>

</html>