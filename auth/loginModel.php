<?php
session_start();
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
                        header("Location: ../login.php?error=wrongPassword");
                    }
                    else{
                        $queryApproved = "SELECT * FROM `users` WHERE user_name='$username' AND is_approved = 1;";
                        $userApproved = mysqli_query($connection, $queryApproved);
                        $userFound = mysqli_num_rows($userApproved);
                        setcookie("uid", $row['id']);
                        $_SESSION['uid'] = $row['id'];
                        $_SESSION['username'] = $row['user_name'];
                        if($userFound==0){
                            header("Location: ../notApproved.php");
                        }
                        else{                                               
                            header("Location: ../index.php?status=SuccessfullyLoggedin");                        
                        } 
                        
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