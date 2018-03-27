<?php
session_start(); 
$error=''; 
$connection = mysqli_connect("localhost", "root", "", "bbc");

$username= mysqli_real_escape_string($connection , $_REQUEST['email']);
$password=$_REQUEST['psw'];




echo $username;
echo $password;

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query("select  from student where password='$password' AND email='$username'", $connection);
$p = mysqli_query("select s_l_name from student where email = '$username'", $connection);

echo $p;
$rows = mysqli_num_rows($query);
echo $rows ;
if ($rows == -1) {
$_SESSION['login_user']=$username;
echo "hello"; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
	$error = "Username or Password is invalid";
	echo "else ma aayu";
	echo $error;
}
mysqli_close($connection); // Closing Connection


?>