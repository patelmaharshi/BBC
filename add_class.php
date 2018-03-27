<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "bbc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}echo "Connected successfully";

// Escape user inputs for security
$class_name = mysqli_real_escape_string($link, $_REQUEST['class_name']);
$class_timing = mysqli_real_escape_string($link, $_REQUEST['class_timing']);
$class_weekday = mysqli_real_escape_string($link, $_REQUEST['class_weekday']);
$class_level_id = mysqli_real_escape_string($link, $_REQUEST['class_level_id']);


 
// attempt insert query execution
$sql = "INSERT INTO class (class_name, class_timing, class_weekday, class_level_id) VALUES ('$class_name', '$class_timing','$class_weekday', '$class_level_id')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
	header("Location: twist\\index.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>