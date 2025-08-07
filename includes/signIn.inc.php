<?php
require_once "config.session.inc.php";
include_once "autoloader.inc.php";
if (isset($_POST["signIn"])) {
    //grabbing data
    $username = $_POST["email"];
    $pwd = $_POST["password"];

    if (allFieldsFilled([$username,$pwd])) {
        
        $login = new SignInContr(escape($username), escape($pwd));
        $login->loginUser();   
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
