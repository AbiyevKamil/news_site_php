<?php

require "/AppServ/www/sdf/news_site_php/queries/run_query.php";
require "/AppServ/www/sdf/news_site_php/queries/seed/seed.php";
require "/AppServ/www/sdf/news_site_php/queries/data/get_comments.php";

function getNews()
{
  // require "../run_query.php";
  // seedData();
  $data = array();
  $sqlToGetAllNews = "SELECT * FROM `news` WHERE is_deleted = 0 and is_approved = 1";
  $query = runQuery($sqlToGetAllNews);
  if ($query) {
    while ($single = mysqli_fetch_assoc($query)) {
      $user_id = $single["user_id"];
      $user = getUser($user_id);
      if (isset($user)) {
        $user_name = $user["user_name"];
        $profile_picture = $user["profile_picture"];
        array_push($data, array(
          "id" => $single["id"],
          "title" => $single["title"],
          "content" => $single["content"],
          "banner" => $single["banner"],
          "created_at" => $single["created_at"],
          "updated_at" => $single["updated_at"],
          "username" => $user_name,
          "profile_picture" => $profile_picture,
        ));
      }
    }
  }
  return $data;
}


function getNewsById($id)
{
  if (isset($id)) {
    $sqlToGetNewsById = "SELECT * FROM `news` WHERE is_deleted = 0 and is_approved = 1 and id = $id";

    $query = runQuery($sqlToGetNewsById);
    if ($query) {
      $news = mysqli_fetch_assoc($query);
      if (isset($news)) {
        $user = getUser($news["user_id"]);
        $comments = getComments($news["id"]);
        return array(
          "user" => $user,
          "news" => $news,
          "comments" => $comments,
        );
      }
    }
  }
}

function getUser($id)
{

  if (isset($id)) {
    $sql = "SELECT * FROM `news_site`.`users` WHERE `id` = '$id';";
    $query = runQuery($sql);
    if ($query) {
      $user = mysqli_fetch_assoc($query);
      if (isset($user)) {
        return array(
          "id" => $user["id"],
          "email" => $user["email"],
          "full_name" => $user["full_name"],
          "user_name" => $user["user_name"],
          "password" => $user["password"],
          "profile_picture" => $user["profile_picture"],
          "profile_picture" => $user["profile_picture"],
          "is_admin" => $user["is_admin"],
        );
      }
    }
  }
}