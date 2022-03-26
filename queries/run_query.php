<?php

function runQuery($sql)
{
  include "../../config/db.php";
  if ($connection) {
    $query = mysqli_query($connection, $sql);
    return $query;
  }
  return false;
}