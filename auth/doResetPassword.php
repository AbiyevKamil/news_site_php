<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["submit"]))
    {
        $username = $_POST["username"]; 
        $full_name = $_POST["full_name"]; 
        $email = $_POST["email"]; 
        $password = $_POST["password"]; 
        $re_password = $_POST["re_password"]; 


        include "/AppServ/www/sdf/news_site_php/auth/resetPasswordController.php";

        $register->registerUser();

    }
    else{
        header("Location: ../index.php?error=registerFailed");
    }
}
?>