<?php
$connection = mysqli_connect("localhost", "root", "", "bbc");

$class_id = mysqli_real_escape_string($connection, $_POST['class_id']);

$sql = "delete from class where class_id ='$class_id'";
$result = $connection->query($sql);

if ($result->num_rows != 1) {
   
	header("Location: twist\\index.html");				
}
else{
	echo "no id found";
}
$connection->close();
?>