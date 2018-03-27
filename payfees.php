<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "bbc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}echo "Connected successfully";

// Escape user inputs for security
$s_id = mysqli_real_escape_string($link, $_REQUEST['s_id']);
$trans_name = mysqli_real_escape_string($link, $_REQUEST['trans_name']);
$trans_money = mysqli_real_escape_string($link, $_REQUEST['trans_money']);

$trans_time = date('Y-m-d H:i:s');

 
// attempt insert query execution
$sql = "INSERT INTO transaction (trans_name, trans_time, trans_money) VALUES ('$trans_name', '$trans_time','$trans_money')";

$trans_id = 0;
if(mysqli_query($link, $sql)){
	$sql = "SELECT * FROM transaction";
	$result = $link->query($sql);
	if ($result->num_rows > 0) {
   
				while($row = $result->fetch_assoc()) {
					$trans_id = $row["trans_id"];
					
				}
			}
			
	$sql = "INSERT INTO stud_trans (s_id, trans_id) VALUES ('$s_id', '$trans_id')";
			$result = $link->query($sql);
			header("Location: twist\\index.html");			

			
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>