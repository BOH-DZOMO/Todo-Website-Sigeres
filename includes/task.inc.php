<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";



if (isset($_POST["create_task"])) {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $deadline = $_POST["deadline"];


    if (allFieldsFilled([$title, $description])) {
        $create_task = new taskContr();
        $create_task->create($_SESSION["user_id"], escape($title), escape($description), escape($deadline));
    } else {
        header('location:../pages/create_task.php?error=create_task');
        die();
    }
} elseif (isset($_POST["edit_task"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $deadline = $_POST["deadline"];
    $task_id = $_POST["task_id"];

    if (allFieldsFilled([$title, $description])) {
        $create_task = new taskContr();
        $create_task->update(escape($task_id), escape($title), escape($description), escape($deadline));
    } else {
        header('location:../pages/edit-task.php?error=update_task');
        die();
    }  
} 

elseif (isset($_POST["delete_task"])) {
     if (allFieldsFilled([$_POST["task_id"]])) {
        $delete = new taskContr();
        $delete->delete(escape($_POST["task_id"]));
    }
    else {
        header('location: ../pages/list.php ');
    }
}
elseif (isset($_POST["complete_task"])) {
     if (allFieldsFilled([$_POST["task_id"]])) {
        $complete = new taskContr();
        $complete->complete(escape($_POST["task_id"]));   
    }
    else {
        header('location: ../pages/list.php ');
    }
}
// elseif (isset($_POST["filter"])) {
//     $startDate = $_POST["first_date"];
//     $endDate = $_POST["last_date"];
//      if (allFieldsFilled([$startDate,$endDate])) {
//         $filter = new taskContr();
//         $filter->(escape($startDate),escape($endDate));   
//     }
//     else {
//         header('location: ../pages/list.php ');
//     }
// }

else {
    header('location:../index.php?source=task.inc');
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
