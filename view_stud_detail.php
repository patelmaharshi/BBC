<?php
$connection = mysqli_connect("localhost", "root", "", "bbc");

$s_id = mysqli_real_escape_string($connection, $_POST['s_id']);


$sql = "SELECT * FROM student WHERE s_id = '$s_id'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
		
			if($row["s_id"] == $s_id){
				header('Location: tableviewofstudent.php?s_id='.$s_id);
			}
			else{
				
				echo "No student have that student id ";	
			}
		
    }
} else {
    echo "No student have that student id ";
	header("Location: twist//view_stud_detail.html");
}
$connection->close();
?>