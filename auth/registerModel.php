<?php
    include "/AppServ/www/sdf/news_site_php/queries/run_query.php";  

    function setUser($username, $full_name, $email, $password){
        $uuid = uniqid("",true);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `users` (`id`, `email`, `full_name`, `user_name`, `password`, `profile_picture`, `is_approved`, `is_admin`) 
        VALUES ('$uuid', '$email', '$full_name', '$username', '$hashed_password', 'default_picture.png', b'0', b'0');";
        
        include "/AppServ/www/sdf/news_site_php/config/db.php";        
        if($connection)
        {
            $registeredUser = mysqli_query($connection, $query);
            if(!empty($registeredUser))
            {  
                // $user_id = $_POST['email'];
                $_SESSION['email'] = $email;

                include "/AppServ/www/sdf/news_site_php/auth/sendConfirmCode.php";
                sendApprovalCode();
                
                header("Location: ../login.php?success=SuccessfullyRegistered");
            }
            else
            {
                header("Location: ../register.php?status=ragisterFailed");
            }
        }
        else
        {
            header("Location: ../register.php?status=connectionFailed");
        }
    }

?>