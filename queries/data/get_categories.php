<?php

require "/AppServ/www/sdf/news_site_php/queries/run_query.php";

function getCategories()
{
  $categories = array();
  $sqlToGetCategories = "SELECT * FROM `categories`;";
  $query = runQuery($sqlToGetCategories);
  if ($query) {
    while ($category = mysqli_fetch_assoc($query)) {
      array_push($categories, $category);
    }
  }
  return $categories;
}
