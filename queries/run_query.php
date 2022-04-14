<?php


function runQuery($sql)
{
  require "/AppServ/www/sdf/news_site_php/config/db.php";
  // include "../../config/db.php";
  if ($connection) {
    $query = mysqli_query($connection, $sql);
    return $query;
  }
  return false;
}
