<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";
if (isset($_POST["signUp"])) {
    //grabbing data
    $username = $_POST["username"];
    $email= $_POST["email"];
    $pwd = $_POST["password"];
    $pwd_confirm = $_POST["password_confirm"];


    // $signup = new SignupContr($username, $pwd, $pwd_confirm, $email);
    // $signup->signupUser();



}
else {
    header('location:../index.php');
    die();
}