<?php
require "../config/db.php";
if ($connection) {
  $sql = "select count(*) as count from news";
  $fetched = mysqli_query($connection, $sql);
  $count = mysqli_fetch_assoc($fetched)["count"];
  if($count === 0) {
      
  }
}