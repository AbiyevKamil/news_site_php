<?php
session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '/AppServ/www/sdf/news_site_php/vendor/phpmailer/phpmailer/src/Exception.php';
  require '/AppServ/www/sdf/news_site_php/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '/AppServ/www/sdf/news_site_php/vendor/phpmailer/phpmailer/src/SMTP.php';

  function sendMail($to, $subject, $body, $altBody){

    $mail = new PHPMailer;

    $mail->isSMTP();
    // $mail->SMTPDebug = 3;
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Port = 587;
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hashimlisahiljr@gmail.com';                 // SMTP username
    $mail->Password = 'nocode0911';                       // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

    $mail->From = 'hashimlisahiljr@gmail.com';
    $mail->FromName = 'NewsApp';
    $mail->addAddress($to);     // Add a recipient
    $mail->addReplyTo('hashimlisahiljr@gmail.com', 'Information');
    $mail->addCC('hashimlisahiljr@gmail.com');
    $mail->addBCC('hashimlisahiljr@gmail.com');

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altBody;

    if (!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      return false;
    } else {
      echo 'Message has been sent';
      return true;
    }

  }

  function saveCodeToDB($email, $code){
    include "/AppServ/www/sdf/news_site_php/config/db.php"; 
    $queryForUser = "SELECT * from `users` WHERE `email` = '$email'";
    
    $forUser = mysqli_query($connection, $queryForUser);
    if (mysqli_num_rows($forUser) > 0){
      $row = mysqli_fetch_assoc($forUser);

      $user_id = $row["id"];
    }

    $queryForDeleting = "DELETE FROM `approval` WHERE user_id = '$user_id';";

    if($connection){
      $delete = mysqli_query($connection, $queryForDeleting);
    }
    
    $queryForSaving = "INSERT INTO `approval` (`user_id`, `code`, `expire_date`) VALUES ('$user_id', '$code', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 720 HOUR))";

    if($connection){

      $saved = mysqli_query($connection, $queryForSaving);

      if($saved){        
        $_SESSION["user_id_for_approval"] = $user_id;
        return true;
      }
    }
    return false;
  }

  function resendApprovalCode(){
    $code = strval(rand(100000,999999));
    $to = $_SESSION['email'];
    $subject = "Welcome to NewsApp";
    $body = "

    <h1>Welcome to NewsApp</h1><br>
    
    <h3>Please confirm your email address</h3> <br>
    
    <p>Thanks for signing up for an account on NewsApp!
    
    Please enter this code below to confirm you email address: <p> <br><b><h2>" . $code . "</h2></b>";
    $altBody = "AltBody";

    $mail = sendMail($to, $subject, $body, $altBody);

    if($mail){
      $save = saveCodeToDB($to, $code);
      if($save){                  
        header("Location: ../notApproved.php?success=codeResent");
      }
      else{
        header("Location: ../notApproved.php?status=codeCouldNotSave");
        echo "not saved";
      }
    }
    else{
      header("Location: ../notApproved.php?status=mailCouldNotSend");
    }
  }
  resendApprovalCode();
?>