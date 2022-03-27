<?php

function seedData()
{
  include "/AppServ/www/sdf/news_site_php/config/db.php";
  include "/AppServ/www/sdf/news_site_php/queries/seed/fetch.php";

  if ($connection) {
    $sqlForNewsCount = "select count(*) as count from news";
    $sqlForUserCount = "select count(*) as count,id from users where `email`='report@gmail.com'";
    $sqlToAddUser = "INSERT INTO users (`email`, `full_name`, `user_name`, `password`, `is_approved`) VALUES ('report@gmail.com', 'Report Az', 'report.az', '123456', b'1');";

    $fetchedUsers = mysqli_query($connection, $sqlForUserCount);
    $user = mysqli_fetch_assoc($fetchedUsers);
    if ($user["count"] == 0) {
      mysqli_query($connection, $sqlToAddUser);
    }
    $fetchedNews = mysqli_query($connection, $sqlForNewsCount);
    $countNews = mysqli_fetch_assoc($fetchedNews)["count"];
    if ($countNews == 0) {
      $user_id = $user["id"];
      $data = fetchData();
      if (count($data) > 0) {
        foreach ($data as $single) {
          $title = $single['title'];
          $img = $single['img'];
          $details = $single['details'];
          $sqlToAddNews = "INSERT INTO `news` (`title`, `content`, `banner`, `user_id`) VALUES ('$title', '$details', '$img', '$user_id');";
          mysqli_query($connection, $sqlToAddNews);
        }
      }
    }
  }
}