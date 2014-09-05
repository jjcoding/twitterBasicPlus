<?php
session_start();
// Connection parameters 
$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password="88888"; // Mysql password 
$database="test"; // Database name 

$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$query1= "DELETE FROM Follows WHERE leaderID='".$_POST['leaderID']."'";

$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));

header("refresh: 1; url=following.php");

print "Successfully unfollowed.";
//window.location="following.php"

//".$leaderID."

// Closing connection
mysqli_close($dbcon);
?>



