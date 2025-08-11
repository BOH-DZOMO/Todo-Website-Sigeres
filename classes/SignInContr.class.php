<?php
class SignInContr extends SignIn
{
    private $email;
    private $pwd;
    private $signInErrors = [];

    public function __construct($email, $pwd)
    {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if ($this->emptyInput()) {
            $this->signInErrors["empty_input"] = "Fill in all fields!";
        }
        if ($this->get_userPassword($this->email) == false) {
            $this->signInErrors["invalid_username"] = "invalid username--";
        } elseif (!password_verify($this->pwd, $this->get_userPassword($this->email)["password"])) {
            $this->signInErrors["invalid_password"] = "invalid password--";
        }

        //review
        if ($this->signInErrors) {
            $_SESSION["errors_signin"] = $this->signInErrors;
            header("location: ../index.php?signin=failed");

            exit();
        }


        $result = $this->get_userData($this->email);
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        header("location: ../pages/dashboard.php?signin=success");
        exit();
    }

    //helper methods

    private function emptyInput()
    {
        if (empty($this->email) || empty($this->pwd)) {
            return true;
        } else {
            return false;
        }
    }
}
