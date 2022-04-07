<?php

$DB = array(
  "hostname" => "localhost",
  "username" => "root",
  "password" => "kamil2002",
  "database" => "news_site",
);

$connection = mysqli_connect($DB["hostname"], $DB["username"], $DB["password"], $DB["database"]);
