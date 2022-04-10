<?php
require '/AppServ/www/sdf/news_site_php/queries/run_query.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Change it later
  $user_id = '60423032-ad08-11ec-ba09-002b67e478b5';
  $id = $_POST["newsId"];
  if (isset($id)) {
    $sql = "UPDATE `news` SET `is_deleted` = b'1', `is_approved` = b'0' WHERE `news`.`id` = $id;";
    $sqlUserCheck = "select id from news where is_deleted = 0 and is_approved = 1 and id = 1 and user_id = '$user_id';";
    $queryUserCheck = runQuery($sqlUserCheck);
    if ($queryUserCheck) {
      $count = mysqli_num_rows($queryUserCheck);
      if ($count > 0) {
        $query = runQuery($sql);
        if ($query) {
          $deleted = mysqli_affected_rows($query);
          if ($deleted > 0) {
            header("Location: index.php?success=SuccessfullyDeletedNews");
          } else {
            header("Location: index.php?status=SomethingWentWrongWhileNewsDelete");
          }
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
