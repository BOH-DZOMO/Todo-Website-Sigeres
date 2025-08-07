<?php
$title = "Todo Site";
require_once("../pages/partials/header.par.php");
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
        <div class="container">
            <h2>Welcome to the dashboard</h2>
            <section>
                <div class="card">
                    <h4>Total Tasks</h4>
                    <p class="total_task">1</p>
                </div>
                <div class="card">
                    <h4>Completed Tasks</h4>
                    <p class="completed_task">2</p>
                </div>
                <div class="card">
                    <h4>Todo</h4>
                    <p class="todo">3</p>
                </div>
            </section>

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