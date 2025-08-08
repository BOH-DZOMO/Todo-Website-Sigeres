<?php
require_once "../includes/config.session.inc.php";
require_once "../includes/autoloader.inc.php";
if (!isset($_SESSION["user_id"])) {
    header("location: ../index.php");
}
$view = new TaskView();
$title = "Todo Site";
function allFieldsFilled(array $data): bool
{
    foreach ($data as $key => $value) {
        if (empty($value) && $value !== '0' && $value !== 0) {
            return false;
        }
    }
    return true;
}
    function escape($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
require_once("./partials/header2.par.php");
?>
<!-- <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css"> -->
<title>Todo Site</title>
<link rel="stylesheet" href="../assets/css/list.css">
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
            <h4>List of Tasks</h4>
            <section>
                <form action="./list.php" method="post" class="">
                    <input type="date" name="first_date" id="">
                    <input type="date" name="last_date" id="">
                    <button class="btn btn-primary" style="font-weight: 500;" type="submit" name="filter">Filter</button>
                </form>
            </section>

            <?php
            // var_dump($view->readAll());
            if (isset($_POST["filter"])) {
                $startDate = $_POST["first_date"];
                $endDate = $_POST["last_date"];
                if (allFieldsFilled([$startDate, $endDate])) {
                    $view->readAll($_SESSION["user_id"],escape($startDate),escape($endDate));
                } else {
                    header('location: ../pages/list.php ');
                }
            } else {
                $view->readAll($_SESSION["user_id"]);
            }
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
    <script src="../assets/jquery-ui-1.13.3.custom/external/jquery/jquery.js"></script>
    <script src="../assets/DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>