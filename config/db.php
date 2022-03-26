<?php
require "env.php";
$DB = getDbVars();
$connection = mysqli_connect($DB["hostname"], $DB["username"], $DB["password"], $DB["database"]);


// <!-- <script src="../public/static/libs/jquery/dist/jquery.min.js"></script>
// <script src="../public/static/main.js"></script> -->