<?php
session_start();

  function checkPasswordMatch(){
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];

    if($password === $re_password){
      return true;
    }
    return false;
  }

  function resetPassword(){
      if(checkPasswordMatch()){
        $newPassword = $_POST["password"];
        $hashed_newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $user_id = $_SESSION["user_id_for_recovery"];
        $queryForReset = "UPDATE `users` SET `password`='$hashed_newPassword' WHERE `id`='$user_id'";
        include "/AppServ/www/sdf/news_site_php/config/db.php"; 
        if(!$connection){
          header("Location: ../resetPassword.php?status=connectionFailed");
        }
        $forReseting = mysqli_query($connection, $queryForReset);
        if($forReseting){
          header("Location: ../login.php?success=passwordResetedSuccessfully");
        }
        else{
          header("Location: ../resetPassword.php?status=resettingFailed");

        }
      }
      else{
        header("Location: ../resetPassword.php?status=passwordsDoNotMatch");
      }
  }
  resetPassword();
?>
