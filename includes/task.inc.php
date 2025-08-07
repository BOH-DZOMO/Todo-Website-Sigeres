<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";
if (isset($_POST["create_task"])) {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $deadline = $_POST["deadline"];

    if (allFieldsFilled($title, $description)) {
        $create_task = new taskContr();
        $create_task->create($_SESSION["user_id"], $title, $description, $deadline);
    } else {
        header('location:../pages/create_task.php?error=create_task');
        die();
    }
} elseif (isset($_POST["update_task"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $deadline = $_POST["deadline"];

    if (allFieldsFilled($title, $description)) {
        $create_task = new taskContr();
        // $create_task->update($_SESSION["user_id"], $title, $description, $deadline);
    } else {
        header('location:../pages/create_task.php?error=update_task');
        die();
    }
} else {
    header('location:../index.php');
    die();
}

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
