<?php
session_start();

  function fetchCodeFromDB(){
    include "/AppServ/www/sdf/news_site_php/config/db.php"; 
    $user_id = $_SESSION["uidNA"];
    $queryForUser = "SELECT * FROM `approval` WHERE user_id = '$user_id'";
    
    $forUser = mysqli_query($connection, $queryForUser);
    if (mysqli_num_rows($forUser) > 0){
      $row = mysqli_fetch_assoc($forUser);
      $approval_code = $row["code"];
    }
    else{
      header("Location: ../notApproved.php?status=userCouldNotFound");      
    }
    return $approval_code;

  }

  function checkApprovalCode(){
    $code = fetchCodeFromDB();
    $userInput = $_POST["confirm_account"];
    if($code === $userInput){
      return true;
    }
    return false;
  }

  function doApproved(){
    if(checkApprovalCode()){
        $user_id = $_SESSION["uidNA"];

        $queryForApprove = "UPDATE `users` SET `is_approved`= 1 WHERE id = '$user_id'";

        include "/AppServ/www/sdf/news_site_php/config/db.php"; 

        $forApprove = mysqli_query($connection, $queryForApprove);
        header("Location: ../login.php?success=Approved");         
           
    }
    else{
      header("Location: ../notApproved.php?status=WrongCode");       
    }

  }
  doApproved();
?>