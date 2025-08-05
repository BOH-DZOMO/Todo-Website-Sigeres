<?php
class SignIn extends dbh{
     protected function get_userPassword(string $email) {
        $query = "SELECT password FROM users WHERE email = :email";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    
        if ($stmt->rowCount() == 1) {
           return $stmt->fetch();
        }
        else {
            return false;
        }
    }
    protected function get_userData(string $email) {
        $query = "SELECT username, id FROM users WHERE email = :email";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();   
        $result = $stmt->fetch();
        return $result;
    }
}