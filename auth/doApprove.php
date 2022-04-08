<?php
session_start();

  function fetchCodeFromDB(){
    include "/AppServ/www/sdf/news_site_php/config/db.php"; 
    $user_id = $_SESSION["uid"];
    $queryForUser = "SELECT * FROM `approval` WHERE user_id = '$user_id'";
    
    $forUser = mysqli_query($connection, $queryForUser);
    if (mysqli_num_rows($forUser) > 0){
      $row = mysqli_fetch_assoc($forUser);
      // $date = new DateTime($row["expire_date"]);
      // $date->add(new DateInterval('PT3M'));
      // if($date < date("Y/m/d H:i:s")){
      $approval_code = $row["code"];
      // }
      // else{
      //   echo "expire_date ";
      // }
    }
    else{
      echo "No row ";
    }
    // echo "Code:" . $recovery_code . " | " . $user_id . " | Date: " . $date;
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
        $user_id = $_SESSION["uid"];

        $queryForApprove = "UPDATE `users` SET `is_approved`= 1 WHERE id = '$user_id'";

        include "/AppServ/www/sdf/news_site_php/config/db.php"; 

        $forApprove = mysqli_query($connection, $queryForApprove);
        header("Location: ../index.php?status=Approved");         
           
    }
    else{
      header("Location: ../notApproved.php?error=WrongCode");         

    }

  }
  doApproved();
?>