<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";
if (isset($_POST["signIn"])) {
    //grabbing data
    $username = $_POST["email"];
    $pwd = $_POST["password"];



    // $login = new LoginContr($username, $pwd);
    // $login->loginUser();   
} elseif (isset($_POST("logout"))) {
    session_start();
    session_unset();
    session_destroy();
    header("location: ../index.php");
    die();
} else {
    header('location:../index.php');
    die();
}
