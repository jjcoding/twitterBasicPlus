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
//print 'Connected successfully!<br>';

// Selecting a database
//   Unnecessary in this case because we have already selected 
//   the right database with the connect statement.  
mysqli_select_db($dbcon, $database)
   or die('Could not select database');
//print 'Selected database successfully!<br>';

// Listing tables in your database
$query = 'SELECT * FROM Users';
$result = mysqli_query($dbcon, $query)
  or die('Show tables failed: ' . mysqli_error());

print "All user IDs:";

while($row = mysqli_fetch_array($result))
{
  print '<ul>';
  print '<li>'. $row['userID'];
  print '</ul>';
}


// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 

</body>
</html>
