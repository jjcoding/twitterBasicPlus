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

$content = $_POST['tweet'];
$len=strlen($content);

// Get the followings of the user with the given username and password

$query1= "INSERT INTO Tweets(tweet, time_stamp, userID) Values('$content', CURRENT_TIMESTAMP(),'".$_SESSION['myUserID']."')"; 

$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));

$tweetid=mysqli_insert_id($dbcon);
 
header("refresh: 1; url=myTweets.php");
print "Successfully posted!";

// Closing connection
mysqli_close($dbcon);
?> 
