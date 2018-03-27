<!DOCTYPE html>
<html>
<head>
<title>
Transaction History 
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: Black;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

.main {
    margin-left: 200px; /* Same as the width of the sidenav */
}
table, th, td {
    border: 1px solid black;
	text-align: center;
}
</style>
</head>


<body onload = "document.getElementById('loginid').style.display='block'" >

<div id="loginid" class="modal">
 
  <form class="modal-content" action="http://localhost/phpmyadmin/newlogin.php" method = "POST">
  <table class="modal-content">
  <div class="container">
	<tr>
		<th>student_id</th>
		<th>Trans_id</th>
		<th>Trans_Name</th>
		<th>Trans_time</th>
		<th>Trans_amount</th>


	</tr>
	
		
		<?php
			$connection = mysqli_connect("localhost", "root", "", "bbc");
			$s_id = $_GET["s_id"];
			$sql = "SELECT * FROM stud_trans WHERE s_id = '$s_id'";
			$result = $connection->query($sql);
			
			if ($result->num_rows > 0) {
   
				while($row = $result->fetch_assoc()) {
					echo"</tr>";
					echo"<td>".$row["s_id"]."</td>";
					echo"<td>".$row["trans_id"]."</td>";

					$trans_id = $row["trans_id"];
					$psql = "SELECT * FROM transaction WHERE trans_id = '$trans_id'";
				$presult = $connection->query($psql);
				while($prow = $presult->fetch_assoc()) {
					echo"<td>".$prow["trans_name"]."</td>";	
					echo"<td>".$prow["trans_time"]."</td>";	
					echo"<td>".$prow["trans_money"]."</td>";	
					echo"</tr>";
				}
				}
				
			}
		$connection->close();
		?>

		
    <div class="container">
      <h1>Transaction Details</h1>

    </div>
  </form>
</div>


<script>

// Get the modal
var modal1 = document.getElementById('loginid');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
		window.location.href = "C://xampp//phpMyAdmin//twist//index.html"
    }
}

</script>

</body>
</html>
