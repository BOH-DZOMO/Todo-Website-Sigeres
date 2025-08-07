<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";
if (isset($_POST["signUp"])) {

    //grabbing data
    $username = $_POST["username"];
    $email= $_POST["email"];
    $pwd = $_POST["password"];
    $pwd_confirm = $_POST["password_confirm"];

    if (allFieldsFilled([$username, $pwd, $pwd_confirm, $email])) {
        
        $signup = new SignupContr(escape($username), escape($pwd), escape($pwd_confirm), escape($email));
        $signup->signupUser();
    }



}
else {
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