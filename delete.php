<?php
session_start();
// Connection parameters 
$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password="88888"; // Mysql password 
$database="test"; // Database name 
$tbl_name="Users"; // Table name ??

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

$tweetID=$_REQUEST['tweetID'];
$query1= "DELETE FROM Tweets WHERE tweetID=$tweetID";
$query2= "DELETE FROM Likes WHERE tweetID=$tweetID";
//$query3= "DELETE FROM Replys WHERE beCommentedID=$tweetID";
//$query4= "DELETE FROM Retweets WHERE tweetID=$tweetID";

$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));
$result2 = mysqli_query($dbcon, $query2)
  or die('Query failed: ' . mysqli_error($dbcon));
  
header("refresh: 1; url=myTweets.php");
print "Successful deleted.";

// Closing connection
mysqli_close($dbcon);
?> 
