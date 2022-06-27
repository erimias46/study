<?php


$dbhost="localhost";
$dbname="study";
$dbpass="";
$dbuser="root";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>