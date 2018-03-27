<?php
$connection = mysqli_connect("localhost", "root", "", "bbc");

$s_id = mysqli_real_escape_string($connection, $_POST['s_id']);

$sql = "delete from student where s_id ='$s_id'";
$result = $connection->query($sql);
$admin_id = 123;
if ($result->num_rows != 1) {
	$sql = "delete from parent where s_id ='$s_id'";
	$result = $connection->query($sql);
	if ($result->num_rows != 1) {
		header("Location: twist\\index.html");	
	}
}
else{
	echo "no id found";
}
$connection->close();
?>