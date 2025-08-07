<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";
if (isset($_POST["signIn"])) {
    //grabbing data
    $username = $_POST["email"];
    $pwd = $_POST["password"];



    // $login = new LoginContr($username, $pwd);
    // $login->loginUser();   
} else {
    header('location:../index.php');
    die();
}
