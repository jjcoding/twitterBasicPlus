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

$userID = $_REQUEST['user'];


$query1 = "
SELECT userID, name, email 
FROM Users WHERE userID='$userID'";


$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));

print "<h1>Search result:</h1>";
//print " <a href='login_success.php'>go back to homepage</a> ";
//print "<p>*Once you click follow, the person will be added to your following list. You can check"." <a href='following.php'>here</a> ";
//print "<p>*if no results are displayed check 1. whether you have already followed him/her. 2. whether you have the right name or email";
while ($tuple1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
  print '<ul>'; 
  print '<li>ID: '. $tuple1[0];
  print '<li>name: '. $tuple1[1];
  print '<li>email: '. $tuple1[2];
  print '<table cellpadding="0" cellspacing ="0" width="10%" style="border: 4px solid transparent;"> 
<tr style="border: 3px solid #000;"> 
         <td><form action="follow.php" method="post"><input type="hidden" name=leaderID value='.$tuple1[0].'><input type="submit" value="follow"></form></td>
         
         </tr></table>';
  print '<p>';
  print '</ul>';
}



// Closing connection
mysqli_close($dbcon);
?> 
