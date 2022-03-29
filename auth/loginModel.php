<?php

    function getUser($username, $password){
        
        $query = "SELECT * FROM `users` WHERE user_name='$username';";
        
        include "/AppServ/www/sdf/news_site_php/config/db.php";        
        if($connection)
        {
            $user = mysqli_query($connection, $query);
            if(!empty($user))
            {  
                $row = mysqli_fetch_array($user, MYSQLI_ASSOC);
                $checkPass = password_verify($password, $row['password']);
                
                if($checkPass == false){
                    header("Location: ../index.php?error=wrongPassword");
                }
                else{
                    setcookie("uid", $row['id']);
                    header("Location: ../index.php?status=SuccessfullyLoggedin");
                }
                
            }
            else
            {
                header("Location: ../index.php?error=userDoesNotExist");
            }
        }
        else
        {
            header("Location: ../index.php?error=connectionFailed");
        }
    }

?>