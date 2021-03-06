<?php
session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '/AppServ/www/sdf/news_site_php/phpmailer/src/Exception.php';
  require '/AppServ/www/sdf/news_site_php/phpmailer/src/PHPMailer.php';
  require '/AppServ/www/sdf/news_site_php/phpmailer/src/SMTP.php';

  function sendMail($to, $subject, $body, $altBody){

    $mail = new PHPMailer;

    $mail->isSMTP();
    // $mail->SMTPDebug = 3;
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Port = 587;
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'stphoenix2002@gmail.com';                 // SMTP username
    $mail->Password = 'akamil2002';                       // SMTP password
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

  function saveCodeToDB($user, $code){
    include "/AppServ/www/sdf/news_site_php/config/db.php"; 
    $queryForUser = "SELECT * from `users` WHERE `email` = '$user'";
    
    $forUser = mysqli_query($connection, $queryForUser);
    if (mysqli_num_rows($forUser) > 0){
      $row = mysqli_fetch_assoc($forUser);

      $user_id = $row["id"];
    }
    else{
      header("Location: ../forgetPassword.php?status=userNotFound");
      exit();
    }

    $queryForDeleting = "DELETE FROM `recovery` WHERE user_id = '$user_id';";

    if($connection){
      $delete = mysqli_query($connection, $queryForDeleting);
    }
    else{
      header("Location: ../forgetPassword.php?status=connectionFailed");
    }
    $queryForSaving = "INSERT INTO `recovery` (`user_id`, `code`, `expire_date`) VALUES ('$user_id', '$code', DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 3 MINUTE));";

    if($connection){

      $saved = mysqli_query($connection, $queryForSaving);

      if($saved){        
        $_SESSION["user_id_for_recovery"] = $user_id;
        return true;
      }
    }
    return false;
  }

  function resendRecoveryCode(){
    $code = strval(rand(100000,999999));
    if(empty($_SESSION['emailForReset']) && !isset($_SESSION['emailForReset'])){
      $_SESSION['emailForReset'] = $_POST['email'];
    }
    $to = $_SESSION['emailForReset'];

    $subject = "Password reset request";
    $body = "<h1>Reset your password?</h1> <br>
            <p>If you requested a password reset, use the confirmation code below to complete the process. 
            If you didn't make this request, ignore this email. <p><br>
            This is your recovery code: 
            <br> <b><h2>" . $code . "</h2></b>";
    $altBody = "AltBody";

    $mail = sendMail($to, $subject, $body, $altBody);

    if($mail){
      $save = saveCodeToDB($to, $code);
      if($save){ 
        header("Location: ../recoveryCode.php?success=recoveryCodeSent");
      }
      else{
        header("Location: ../recoveryCode.php?status=codeCouldNotSave");
      }
    }
    else{
      header("Location: ../recoveryCode.php?status=mailCouldNotSend");
    }
  }
  resendRecoveryCode();
?>