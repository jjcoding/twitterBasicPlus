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


// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Get the followings of the user with the given username and password
$query1 = "
SELECT userID, name, email 
FROM Users WHERE userID IN 
(SELECT leaderID 
FROM Follows 
WHERE followerID='".$_SESSION['myUserID']."')
";
$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));

print "People I am followings: ";
while ($tuple1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
  // Printing user attributes in HTML
  print '<ul>';  
  print '<li>ID: '. $tuple1[0];
  print '<li>Name: '. $tuple1[1];
  print '<li>Email: '. $tuple1[2];
  print '<table cellpadding="0" cellspacing ="0" width="10%" style="border: 4px solid transparent;"> 
<tr style="border: 3px solid #000;"> 
         <td><form action="unfollow.php" method="post"><input type="hidden" name=leaderID value='.$tuple1[0].'><input type="submit" value="unfollow"></form></td>
          </tr></table>';
  print '<p>';
  print '</ul>';
}

// Free result
mysqli_free_result($result1);

// Closing connection
mysqli_close($dbcon);
?> 

</body>
</html>
