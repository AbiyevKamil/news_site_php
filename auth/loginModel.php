<?php
session_start();
    function getUser($username, $password){
        
        $query = "SELECT * FROM `users` WHERE user_name='$username' OR email='$username';";
        
        include "/AppServ/www/sdf/news_site_php/config/db.php";        
        if($connection)
        {
            $user = mysqli_query($connection, $query);
            if(!empty($user))
            {  
                $row = mysqli_fetch_array($user, MYSQLI_ASSOC);
                $checkPass = password_verify($password, $row['password']);                 
                if($checkPass == false){                    
                    header("Location: ../login.php?status=wrongPassword");
                }
                else{
                    $queryApproved = "SELECT * FROM `users` WHERE (user_name='$username' OR email='$username') AND is_approved = 1;";
                    $userApproved = mysqli_query($connection, $queryApproved);
                    $userFound = mysqli_num_rows($userApproved);
                    // setcookie("uid", $row['id']);
                    
                    // if(!empty($_POST['rememberMe'])){
                    //     setcookie('usernameCoo', $row['user_name'], time()+86400*3);
                    //     setcookie('uidCoo', $row['id'], time()+86400*3);
                    //     setcookie('passwordCoo', $row['password'], time()+86400*3);
                    // }
                    
                    $_SESSION['username'] = $row['user_name'];
                    $_SESSION['email'] = $row['email'];
                    if($userFound==0){
                        header("Location: ../notApproved.php");
                        $_SESSION['uidNA'] = $row['id'];
                    }
                    else{                                               
                        $_SESSION['uid'] = $row['id'];
                        header("Location: ../index.php?success=SuccessfullyLoggedin");                        
                    } 
                    
                }                                       
            }
            else
            {
                header("Location: ../login.php?status=userDoesNotExist");
            }
        }
        else
        {
            header("Location: ../login.php?status=connectionFailed");
        }
    }

?>