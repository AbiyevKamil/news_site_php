<?php
session_start();
require '/AppServ/www/sdf/news_site_php/queries/run_query.php';
if (!$_SESSION["uid"]) {
  header("Location: index.php?status=Unauthorized");
} else {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Change it later
    $user_id = $_SESSION["uid"];
    $id = $_POST["newsId"];

    if (isset($id)) {
      $sqlToAuthorize = "select id from news where user_id = '$user_id' and id = '$id'";
      $queryToAuthorize = runQuery($sqlToAuthorize);
      if ($queryToAuthorize) {
        $rowCount = mysqli_num_rows($queryToAuthorize);
        if ($rowCount == 0)
          header("Location: index.php?status=Unauthorized");
      }

      $sqlDelete = "UPDATE `news` SET `is_deleted` = b'1', `is_approved` = b'0' WHERE `news`.`id` = $id;";
      $sqlUserCheck = "select id from news where is_deleted = 0 and is_approved = 1 and id = $id and user_id = '$user_id';";
      $queryUserCheck = runQuery($sqlUserCheck);
      if ($queryUserCheck) {
        $newsID = mysqli_fetch_assoc($queryUserCheck)['id'];
        if ($newsID) {
          $queryDelete = runQuery($sqlDelete);
          if ($queryDelete) {
            header("Location: index.php?success=SuccessfullyDeletedNews");
          } else {
            header("Location: index.php?status=SomethingWentWrongWhileNewsDelete");
          }
        } else {
          header("Location: index.php?status=NotAllowedToDelete");
        }
      }
    } else {
      header("Location: index.php?status=NotValidIdForNews");
    }
  } else {
    header("Location: index.php");
  }
}
