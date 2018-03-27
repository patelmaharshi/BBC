<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "bbc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}echo "Connected successfully";

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['f_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['l_name']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
$mob = mysqli_real_escape_string($link, $_REQUEST['contact']);
$add = mysqli_real_escape_string($link, $_REQUEST['address']);
$pwdd = mysqli_real_escape_string($link, $_REQUEST['psw']);

$doj = date('Y-m-d');
$pwd = sha1($pwdd);
$rank = "white";

$parent_name =  mysqli_real_escape_string($link, $_REQUEST['parent_name']);
$parent_mobile =  mysqli_real_escape_string($link, $_REQUEST['parent_mobile']);
$parent_email =  mysqli_real_escape_string($link, $_REQUEST['parent_email']);
 
// attempt insert query execution
$sql = "INSERT INTO student (s_f_name, s_l_name, gender, email, dob, s_mobile, address, doj, password) VALUES ('$first_name', '$last_name','$gender', '$email', '$dob', '$mob', '$add', '$doj', '$pwd')";

if(mysqli_query($link, $sql)){
	
	
		$sql = "SELECT * FROM student WHERE email = '$email'";
			$result = $link->query($sql);

			if ($result->num_rows > 0) {
   
				while($row = $result->fetch_assoc()) {
					$s_id = $row["s_id"];
					$sql = "INSERT INTO parent (parent_name, parent_mobile, parent_email, s_id) VALUES ('$parent_name', '$parent_mobile','$parent_email', '$s_id')";
					if(mysqli_query($link, $sql)){
						header('Location: updatedefaultrank.php?s_id='.$s_id);
						echo "Records added successfully.";
					}
				}
			}
	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>