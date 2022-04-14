<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["submit"]))
    {
        include "/AppServ/www/sdf/news_site_php/config/db.php";        
        if(!$connection){
            header("Location: ../register.php?status=connectionFailed");
        }
        $username = mysqli_real_escape_string($connection, $_POST["username"]); 
        $full_name = mysqli_real_escape_string($connection, $_POST["full_name"]); 
        $email = mysqli_real_escape_string($connection, $_POST["email"]); 
        $password = mysqli_real_escape_string($connection, $_POST["password"]); 
        $re_password = mysqli_real_escape_string($connection, $_POST["re_password"]); 


        include "/AppServ/www/sdf/news_site_php/auth/registerController.php";


        $register = new RegisterController($username, $full_name, $email, $password, $re_password);

        $register->registerUser();

    }
    else{
        header("Location: ../register.php?status=registerFailed");
    }
}
?>