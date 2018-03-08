<?php
	session_start();
 	include_once("connection.php");
 	global $con;

 	if(isset($_POST['register']))
 	{
 		$name 		   	= test_input($_POST['company']);
 		$email 		   	= test_input($_POST['email']);
 		$phone 		   	= test_input($_POST['phone']);

 		$insert = "insert into client_profile 
 							   (bus_name, email, cell_phone) 
 						values ('$name','$email','$phone')";
 		$run_insert = mysqli_query($con, $insert);
 		if($run_insert)
 		{
 			echo "<script>alert('rada safi bradhee')</script>";
 		}
 		
 	}


	function test_input($data) 	
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>