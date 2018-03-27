<?php
$connection = mysqli_connect("localhost", "root", "", "bbc");

$email = mysqli_real_escape_string($connection, $_POST['email']);
$pwdd = mysqli_real_escape_string($connection, $_POST['psw']);
$pwd = sha1($pwdd);

$sql = "SELECT s_id, s_f_name, password FROM student WHERE email = '$email'";
$result = $connection->query($sql);
$admin_id = 123;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$s_f_name = $row["s_f_name"];
		if($row["password"] == $pwd){
				session_start("s_id");
				header("Location: twist\\index.html");
			
		}
		else{
				echo " Enter valid id again";
		}
    }
} else {
    echo "0 results";
}
$connection->close();
?>