<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["submit"]))
    {
        $username = $_POST["username"];  
        $password = $_POST["password"];


        include "/AppServ/www/sdf/news_site_php/auth/loginController.php";


        $login = new LoginController($username, $password);

        $login->loginUser();

    }
    else{
        header("Location: ../index.php?error=loginFailed");
    }
}

?>