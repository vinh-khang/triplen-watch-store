<?php
$mysqli = new mysqli("localhost","root","","quanlydathang");
$mysqli->set_charset("utf8");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


?>