<?php
function getNews()
{
  require "../run_query.php";
  $data = array();
  $sqlToGetAllNews = "SELECT * FROM `news` WHERE is_deleted = 0";
  $query = runQuery($sqlToGetAllNews);
  if (isset($query)) {
    while ($single = mysqli_fetch_assoc($query)) {
      $user_id = $single["user_id"];
      $sqlToGetUserName = "SELECT * FROM `users` WHERE `id` = '$user_id';";
      $queryUser = runQuery($sqlToGetUserName);
      if ($queryUser) {
        $user_name = mysqli_fetch_assoc($queryUser)["user_name"];
        array_push($data, array(
          "id" => $single["id"],
          "title" => $single["title"],
          "content" => $single["content"],
          "banner" => $single["banner"],
          "created_at" => $single["created_at"],
          "updated_at" => $single["updated_at"],
          "username" => $user_name,
        ));
      }
    }
  }
  return $data;
}