<?php
include "/AppServ/www/sdf/news_site_php/auth/loginModel.php";

class LoginController{

    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header("Location: ../login.php?status=emptyInput");
            exit();
        }
        
        getUser($this->username, $this->password);
    }
    
    private function emptyInput(){
        $result = true;
        if(empty($this->username) || empty($this->password))
        {
            $result = false;
        }
        return $result;
    }
}

?>