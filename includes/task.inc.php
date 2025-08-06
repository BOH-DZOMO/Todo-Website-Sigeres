<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";
if (isset($_POST["create_task"])) {
    
    $title = $_POST["title"];
    $description= $_POST["description"];
    $deadline = $_POST["deadline"];


    // $create_task = new Task();
    // $create_task->create($_SESSION["user_id"],$title,$description,$deadline);



}
else {
    header('location:../index.php');
    die();
}