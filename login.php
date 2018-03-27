<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "bbc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}echo "Connected successfully";

$email = mysqli_real_escape_string($link, $_POST['$email']);
$pwdd = mysqli_real_escape_string($link, $_POST['psw']);
$pwd = sha1($pwdd);

session_start();
 $res=("SELECT * FROM student WHERE email=$email password=$pwd");
 if(mysqli_num_rows($res) == 1)
    {
		$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
		$user = $row['email'];
        $pass = $row['password'];
		echo $pass;
		echo $password;
		if ($password != $pass)
        {
			echo"Please Register your details";
		}
		else
		{
			 header("Location: C:\\Users\\Maharshi\\Downloads\\twist\\index.html");
		}
	}
	else
	{
		
        echo"Enter the Valid Password";
    }
 mysqli_free_result($res);
mysqli_close($link);
?>