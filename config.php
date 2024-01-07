<?php
$servername = "localhost";
$username = "sql_ims_fcrit_ac";
$password = "WEpwb7F7iCY86MBa";
$db = "sql_ims_fcrit_ac";
// Create connection
$connection = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}
?>