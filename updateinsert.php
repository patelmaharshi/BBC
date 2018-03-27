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
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
$mob = mysqli_real_escape_string($link, $_REQUEST['contact']);
$add = mysqli_real_escape_string($link, $_REQUEST['address']);




$parent_name =  mysqli_real_escape_string($link, $_REQUEST['parent_name']);
$parent_mobile =  mysqli_real_escape_string($link, $_REQUEST['parent_mobile']);
$parent_email =  mysqli_real_escape_string($link, $_REQUEST['parent_email']);
 
// attempt insert query execution


		$sql = "SELECT * FROM student WHERE email = '$email'";
			$result = $link->query($sql);
			if ($result->num_rows > 0) {
				
				while($row = $result->fetch_assoc()) {
					$s_id = $row["s_id"];
					$sql = "UPDATE student SET s_f_name='$first_name' , s_l_name='$last_name', email='$email', dob='$dob', s_mobile='$mob', address='$add' WHERE s_id = '$s_id'";
					if(mysqli_query($link, $sql)){
						
						$sql = "UPDATE parent SET parent_name='$parent_name',parent_mobile='$parent_mobile',parent_email='$parent_email' WHERE s_id = '$s_id'";
						if(mysqli_query($link, $sql)){
							header("Location: twist\\index.html");		
						}
					}
				}
			}
	

// close connection
mysqli_close($link);
?>