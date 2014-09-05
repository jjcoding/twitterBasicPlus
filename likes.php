<?php
session_start();
?>
<html>
<body>
<a href="login_success.php">Home</a> <br>
<p>
<?php
// Connection parameters 
$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password="88888"; // Mysql password 
$database="test"; // Database name 
$tbl_name="Users"; // Table name ??

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Get the tweets of the user with the given username and password
$query1 = "SELECT time_stamp, tweet, tweetID, userID FROM Tweets
WHERE tweetID IN
(SELECT tweetID
FROM Likes 
WHERE userID='".$_SESSION['myUserID']."')";

$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));

print "<h1>Tweets I like: </h1>";
while ($tuple1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
  print '<ul>'; 
  print '<li>'. $tuple1[0];
  print '<li>'. $tuple1[1];
  print '<li> by '.$tuple1[3];
  print '<br><a href="dislike.php?tweetID='.$tuple1[2].'">dislike</a>';
  print '</ul>';
}
?> 

</body>
</html>

<?php
// Free result

mysqli_free_result($result1);

// Closing connection
mysqli_close($dbcon);
?> 
