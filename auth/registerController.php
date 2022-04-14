<?php
include "/AppServ/www/sdf/news_site_php/auth/registerModel.php";

class RegisterController{

    private $username;
    private $full_name;
    private $email;
    private $password;
    private $re_password;

    public function __construct($username, $full_name, $email, $password, $re_password){
        $this->username = $username;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password = $password;
        $this->re_password = $re_password;
    }

    public function registerUser(){
        if($this->emptyInput() == false){
            header("Location: ../register.php?status=emptyInput");
            exit();
        }

        if($this->invalidUsername() == false){
            header("Location: ../register.php?status=invalidUsername");
            exit();
        }

        if($this->invalidEmail() == false){
            header("Location: ../register.php?status=invalidEmail");
            exit();
        }

        if($this->passwordMatch() == false){
            header("Location: ../register.php?status=passwordsDoNotMatch");
            exit();
        }

        if($this->checkUserExist($this->email, $this->username) == false){
            header("Location: ../register.php?status=UserAlreadyExists");
            exit();
        }
        
        setUser($this->username, $this->full_name, $this->email, $this->password);
    }
    
    private function emptyInput(){
        $result = true;
        if(empty($this->username) || empty($this->full_name) || empty($this->email) || 
        empty($this->password) || empty($this->re_password))
        {
            $result = false;
        }
        return $result;
    }

    private function invalidUsername(){
        $result = true;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username))
        {
            $result = false;
        }
        return $result;
    }

    private function invalidEmail(){
        $result = true;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        return $result;
    }

    private function passwordMatch(){
        $result = true;
        if($this->password != $this->re_password)
        {
            $result = false;
        }
        return $result;
    }

    private function checkUserExist($email, $username){
        $result = true;
        $queryUserCheck = "SELECT * FROM users WHERE email = '$email' OR user_name = '$username';";
        include "/AppServ/www/sdf/news_site_php/config/db.php";
        
        if($connection){
            $userNum = mysqli_query($connection, $queryUserCheck);
            $rowNum = mysqli_num_rows($userNum);
            if(!empty($rowNum)){
                $result = false;
            }
        }
        else
        {
            header("Location: ../register.php?status=connectionFailed");
        }
        return $result;
    }
}

?>