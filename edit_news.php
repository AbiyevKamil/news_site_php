<?php
session_start();
require "/AppServ/www/sdf/news_site_php/config/db.php";
require '/AppServ/www/sdf/news_site_php/queries/run_query.php';
if (!$_SESSION["uid"]) {
  header("Location: index.php?status=Unauthorized");
} else {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sql injection check activate later
    // $newsId = mysqli_real_escape_string($connection, $_POST['newsId']);
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);
    // $category = mysqli_real_escape_string($connection, $_POST['category']);
    $newsId = $_POST['newsId'];
    // $title = $_POST['title'];
    // $content = $_POST['content'];
    $category = $_POST['category'];
    $banner = $_FILES["banner"]["name"];
    $user_id = $_SESSION["uid"];
    $sqlToAuthorize = "select id from news where user_id = '$user_id' and id = '$newsId'";
    $queryToAuthorize = runQuery($sqlToAuthorize);
    if ($queryToAuthorize) {
      $rowCount = mysqli_num_rows($queryToAuthorize);
      if ($rowCount == 0)
        header("Location: index.php?status=Unauthorized");
    } else {
      header("Location: index.php?status=NewsEditNotWorking");
    }
    if ($title && $content && $category) {
      if (strlen($title) > 2 && strlen($title) <= 150) {
        if (strlen($content) > 100) {
          if ($banner) {
            $target_dir = "public/uploads/news/";
            $file_path =  uniqid() . basename($_FILES["banner"]["name"]);
            $target_file = $target_dir . $file_path;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["banner"]["tmp_name"]);
            if ($check) {
              header("Location: editNews.php?newsId=$newsId?status=IsNotAnImage");
            }

            if (file_exists($target_file)) {
              $target_file = $target_dir . uniqid() . basename($_FILES["banner"]["name"]);
            }

            // Check file size
            if ($_FILES["banner"]["size"] > 500000) {
              header("Location: editNews.php?newsId=$newsId?status=FileTooLarge");
            }
            // SELECT * FROM `news` WHERE id = 2

            // Allow certain file formats
            if (
              $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif"
            ) {
              header("Location: editNews.php?newsId=$newsId?status=NotAllowedFileTypes");
            }
            $isUploaded = move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file);
            if ($isUploaded) {
              // code here
              $sql = "UPDATE `news` SET `title` = '$title',`content` = '$content',`category_id` = $category,`banner` = '$file_path', `is_approved` = b'0' WHERE `id` = $newsId;";
              $query = runQuery($sql);
              if ($query) {
                header("Location: index.php?success=NewsUpdated");
              } else {
                header("Location: editNews.php?newsId=$newsId?status=NotUpdated");
              }
            } else {
              header("Location: editNews.php?newsId=$newsId?status=NotUploaded");
            }
          } else {
            $sql = "UPDATE `news` SET `title` = '$title',`content` = '$content',`category_id` = $category, `is_approved` = b'0' WHERE `id` = $newsId;";
            $query = runQuery($sql);
            if ($query) {
              header("Location: index.php?success=NewsUpdated");
            } else {
              header("Location: editNews.php?newsId=$newsId?status=NotUpdated");
            }
          }
        } else {
          header("Location: editNews.php?newsId=$newsId?status=ContentLengthIsNotValid");
        }
      } else {
        header("Location: editNews.php?newsId=$newsId?status=TitleLengthIsNotValid");
      }
    } else {
      header("Location: editNews.php?newsId=$newsId?status=FillAllFields");
    }
  } else {
    header("Location: index.php");
  }
}
