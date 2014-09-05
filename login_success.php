<?php
session_start();
if ( !isset( $_SESSION['myUserID'] ) ){
header("location:login.html");
}


// Connection parameters 
$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password="88888"; // Mysql password 
$database="test"; // Database name 

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

//Get my full name:
$query0 = "SELECT name FROM Users WHERE userID='".$_SESSION['myUserID']."'";
$result0 = mysqli_query($dbcon, $query0)
  or die('Query failed: ' . mysqli_error($dbcon));
$tuple0 = mysqli_fetch_array($result0, MYSQLI_NUM);

?>

<html>
<head>
<title>Twitter Basic Plus by James Z. Zhou</title>
</head>
<body>
<div id="container" style="width:750px">
<div id="header" style="background-color:#EEEEEE;">
<hr>
<br>
<img src=tbp2.png align="top">
<br>
<br>
</div>

<div id="menu" style="background-color:#EEEEEE;height:500px;width:250px;float:left;">
<img src=homeTwitterBird.png align="middle">
<br>
<br>
<?php 
//print $_SESSION['myUserID'].' ';
print $tuple0[0];
 ?>
<br>
<br>
<a href="myProfile.php">View my profile</a> <br>
<a href="myTweets.php">My Tweets</a> <br>
<a href="following.php">Following</a> <br>
<a href="followers.php">Followers</a> <br>
<br>
<hr>
<a href="login.html"><b>Sign out</b></a>
</div>


<div id="content" style="background-color:lightblue;height:500px;width:500px;float:left;">
<br>
<br>
<form name="myform" action="post.php" method="post">
<div align="center">
<b>Compose new Tweet</b><br>
<textarea cols="40" rows="5" name="tweet"> </textarea>
<br>
<input type="submit" value="post">
</div>
</form>

<a href="likes.php">Tweets I like</a> <br>
<a href="tweetsFollow.php">Tweets from my leaders</a> <br>

<br>
<br>

<div align="center">
<a href="list_users.php">List all users</a><br>
<form method=get action="search.php">
Enter a user ID to find someone:<br>
<input type="text" name="user"><br>
<input type="submit" value="search">
</div>
</form>

</div>

<div id="footer" style="background-color:lightblue;clear:both;text-align:center;">
<hr>
By James Z. Zhou
<br>
</div>
</body>
</html>
