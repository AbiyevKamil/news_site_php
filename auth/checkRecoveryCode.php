<?php
session_start();

  function fetchCodeFromDB(){
    include "/AppServ/www/sdf/news_site_php/config/db.php"; 
    $user_id = $_SESSION["user_id_for_recovery"];
    $queryForUser = "SELECT * FROM `recovery` WHERE user_id = '$user_id'";
    
    $forUser = mysqli_query($connection, $queryForUser);
    if (mysqli_num_rows($forUser) > 0){
      $row = mysqli_fetch_assoc($forUser);
      // $date = new DateTime($row["expire_date"]);
      // $date->add(new DateInterval('PT3M'));
      // if($date < date("Y/m/d H:i:s")){
      $recovery_code = $row["code"];
      // }
      // else{
      //   echo "expire_date ";
      // }
    }
    else{
      echo "No row ";
    }
    // echo "Code:" . $recovery_code . " | " . $user_id . " | Date: " . $date;
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
        header("Location: ../recoveryCode.php?error=WrongRecoveryCode");
    }
    // return false;
  }
  checkRecoveryCode();
?>