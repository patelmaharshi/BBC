<?php
$connection = mysqli_connect("localhost", "root", "", "bbc");

$class_id = mysqli_real_escape_string($connection, $_POST['class_id']);


$sql = "SELECT * FROM class WHERE class_id = '$class_id'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
		
			if($row["class_id"] == $class_id){
				header("Location: tableviewofclass.php");
			}
			else{
				
				echo "No class have that class id ";	
			}
		
    }
} else {
    echo "No student have that student id ";
	
}
$connection->close();
?>