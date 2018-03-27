<?php
$connection = mysqli_connect("localhost", "root", "", "bbc");

$s_id = $_GET["s_id"];
$belt_color = "white";
$award_date = date('Y-m-d');

$sql = "INSERT INTO progress (s_id, belt_color, award_date) VALUES ('$s_id', '$belt_color','$award_date')";
$result = $connection->query($sql);

if ($result->num_rows != 1) {
		

	header("Location: twist\\index.html");
}
else{
	echo "no id found";
}
$connection->close();
?>