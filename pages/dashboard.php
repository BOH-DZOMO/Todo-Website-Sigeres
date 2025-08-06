<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="dashboard.php" method="post">
        <input type="date" name="deadline" id="">
        <input type="text" name="name">
        <input type="email" name="email">
        <button name="create_task">CT</button>
    </form>
    <?php
    if (isset($_POST["create_task"])) {
        var_dump($_POST);

    }
    ?>
</body>
</html>