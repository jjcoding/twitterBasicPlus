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
   
$userID=$_REQUEST['userID'];
$name=$_REQUEST['userName'];
$password=$_REQUEST['pwd'];
$email=$_REQUEST['email'];


if($userID == NULL)
{
  header("refresh: 2; url=signup.html");
  print "Empty user ID: please sign up again.";
}
else if($name == NULL)
{
  header("refresh: 2; url=signup.html");
  print "Empty user name: please sign up again.";
}
else if($password == NULL)
{
  header("refresh: 2; url=signup.html");
  print "Empty password: please sign up again.";
}
else if($email == NULL)
{
  header("refresh: 2; url=signup.html");
  print "Empty email: please sign up again.";
}
else
{
$query1= "INSERT INTO Users(userID, name, email, pwd) VALUES('$userID', '$name', '$email', '$password')";

$result1 = mysqli_query($dbcon, $query1)
  or die('Query failed: ' . mysqli_error($dbcon));

header("refresh: 2; url=login.html");

print "Successfully signed up! <br> Please sign in on the homepage.";
}

/*
else{
header("refresh: 2; url=signup.html");
print "Signup unsuccessful. Please resign up";
}*/

// Closing connection
mysqli_close($dbcon);
?> 
