<?php
require '/AppServ/www/sdf/news_site_php/queries/run_query.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Change it later
  $user_id = 'b7c916ca-b68c-11ec-83ff-002b67e478b5';
  $title = $_POST['title'];
  $description = $_POST['description'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $banner = $_FILES["banner"]["name"];
  if (isset($title) && isset($description) && isset($content) && isset($category) && isset($banner)) {
    if (strlen($title) > 2) {
      if (strlen($description) > 15) {
        if (strlen($content) > 100) {
          $target_dir = "public/uploads/news/";
          $file_path =  uniqid() . basename($_FILES["banner"]["name"]);
          $target_file = $target_dir . $file_path;
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

          $check = getimagesize($_FILES["banner"]["tmp_name"]);
          if ($check) {
            header("Location: addNews.php?status=IsNotAnImage");
          }

          if (file_exists($target_file)) {
            $target_file = $target_dir . uniqid() . basename($_FILES["banner"]["name"]);
          }

          // Check file size
          if ($_FILES["banner"]["size"] > 500000) {
            header("Location: addNews.php?status=FileTooLarge");
          }

          // Allow certain file formats
          if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
          ) {
            header("Location: addNews.php?status=NotAllowedFileTypes");
          }
          $isUploaded = move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file);
          if ($isUploaded) {
            // code here
            $sql = "INSERT INTO `news` (`title`, `description`, `content`, `banner`, `user_id`, `category_id`) VALUES ('$title', '$description', '$content', '$file_path', '$user_id', '$category');";
            $query = runQuery($sql);
            if ($query) {
              header("Location: index.php?status=NewsSentForCheck");
            } else {
              header("Location: addNews.php?status=NotPosted");
            }
          } else {
            header("Location: addNews.php?status=$target_file?n=" . $_FILES["banner"]["tmp_name"]);
          }
        } else {
          header("Location: addNews.php?status=ShortContent");
        }
      } else {
        header("Location: addNews.php?status=ShortDescription");
      }
    } else {
      header("Location: addNews.php?status=ShortTitle");
    }

    // Image

  } else {
    header("Location: addNews.php?status=AllFieldsRequired");
  }
} else {
  header("Location: addNews.php");
}