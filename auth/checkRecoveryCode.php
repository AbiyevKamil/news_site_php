<?php
session_start();

  function fetchCodeFromDB(){
    include "/AppServ/www/sdf/news_site_php/config/db.php"; 
    $user_id = $_SESSION["user_id_for_recovery"];
    $queryForUser = "SELECT * FROM `recovery` WHERE user_id = '$user_id' AND expire_date >= CURRENT_TIMESTAMP ";
    
    if(!$connection){
      header("Location: ../recoveryCode.php?status=connectionFailed");
    }
    
    $forUser = mysqli_query($connection, $queryForUser);
    if (mysqli_num_rows($forUser) > 0){
      $row = mysqli_fetch_assoc($forUser);
      $recovery_code = $row["code"];
    }
    else{
      header("Location: ../recoveryCode.php?status=codeCouldNotFound");
    }
    return $recovery_code;
  }

  function checkRecoveryCode(){
    $code = fetchCodeFromDB();
    $userInput = $_POST["code"];
    if($code === $userInput){
      header("Location: ../resetPassword.php");
    //   return true;
    }
    else{
        header("Location: ../recoveryCode.php?status=WrongRecoveryCode");
    }
    // return false;
  }
  checkRecoveryCode();
?>