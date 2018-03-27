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
$class_id = mysqli_real_escape_string($link, $_REQUEST['class_id']);


$attend_date = date('Y-m-d');

 
// attempt insert query execution
$sql = "INSERT INTO attendance (s_id, class_id, attend_date) VALUES ('$s_id', '$class_id','$attend_date')";
if(mysqli_query($link, $sql)){
    header("Location: twist\\index.html");		
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>