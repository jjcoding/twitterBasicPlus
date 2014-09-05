<?php
session_start();
// Connection parameters 
$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password="88888"; // Mysql password 
$database="test"; // Database name 

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$tweetID=$_REQUEST['tweetID'];
//$query1= "INSERT INTO Tweets(tweet, time_stamp, userID) Values('$content', CURRENT_TIMESTAMP(),'".$_SESSION['myUserID']."')"; 
$query1= "INSERT INTO Likes(tweetID, userID) VALUES('$tweetID', '".$_SESSION['myUserID']."')";


$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));
//$result2 = mysqli_query($dbcon, $query2)
//  or die('Query failed: ' . mysqli_error($dbcon));
  
header("refresh: 1; url=likes.php");
print "Successful liked.";

// Closing connection
mysqli_close($dbcon);
?> 
