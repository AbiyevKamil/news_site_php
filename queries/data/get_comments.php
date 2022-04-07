<?php

// require "/AppServ/www/sdf/news_site_php/queries/run_query.php";
// require "/AppServ/www/sdf/news_site_php/queries/seed/seed.php";
// require "/AppServ/www/sdf/news_site_php/queries/data/get_news.php";

function getComments($news_id)
{
  $comments = array();
  $sqlToGetComments = "SELECT * FROM `comments` WHERE `news_id` = '$news_id';";
  $query = runQuery($sqlToGetComments);
  if ($query) {
    while ($comment = mysqli_fetch_assoc($query)) {
      $user = getUser($comment["user_id"]);
      if (isset($user)) {
        $single = array(
          "id" => $comment["id"],
          "content" => $comment["content"],
          "created_at" => $comment["created_at"],
          "news_id" => $comment["news_id"],
          "user_name" => $user["user_name"],
          "user_picture" => $user["profile_picture"],
        );
        array_push($comments, $single);
      }
    }
  }
  return $comments;
}