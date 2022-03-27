<?php
function getNews()
{
  require "/AppServ/www/sdf/news_site_php/queries/run_query.php";
  require "/AppServ/www/sdf/news_site_php/queries/seed/seed.php";
  // require "../run_query.php";
  // seedData();
  $data = array();
  $sqlToGetAllNews = "SELECT * FROM `news` WHERE is_deleted = 0 and is_approved = 1";
  $query = runQuery($sqlToGetAllNews);
  if (isset($query)) {
    while ($single = mysqli_fetch_assoc($query)) {
      $user_id = $single["user_id"];
      $sqlToGetUserName = "SELECT * FROM `users` WHERE `id` = '$user_id';";
      $queryUser = runQuery($sqlToGetUserName);
      if ($queryUser) {
        $user = mysqli_fetch_assoc($queryUser);
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