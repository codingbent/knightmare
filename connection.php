<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="ecommerce";

// Create connection
$con =mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo("Connection failed: " .mysqli_connect_errno() );
}
?>

