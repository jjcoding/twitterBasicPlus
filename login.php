<?php
session_start();

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password="88888"; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="Users"; // Table name ??

// Connect to server and select databse.
$dbcon =mysqli_connect($host, $username, $password,$db_name)or die("cannot connect"); 


// username and password sent from form 
$myUserID=$_REQUEST['userID']; 
$myPassword=$_REQUEST['password']; 

// To protect MySQL injection (more detail about MySQL injection)

$myUserID = stripslashes($myUserID);
$myPassword = stripslashes($myPassword);
$myUserID = mysqli_real_escape_string($dbcon, $myUserID);
$myPassword = mysqli_real_escape_string($dbcon, $myPassword);

$sql="SELECT * FROM $tbl_name WHERE userID='$myUserID' AND pwd='$myPassword'";
$result=mysqli_query($dbcon, $sql);

$tuple1 = mysqli_fetch_array($result, MYSQLI_NUM);
$userID= $tuple1[0];

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myUserID']=$myUserID;
$_SESSION['myPassword']=$myPassword;
//$_SESSION['myuserid']=$myuserid;

header("location:login_success.php");

}
else {
echo "Wrong User ID or Password<br>";
echo "<a href='login.html'><b>Go back to sign in again<b></a>";
}
?>
