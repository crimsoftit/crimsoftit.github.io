<?php

    session_start();

	require_once 'connection.php';
	global $con;
	
	
	if(isset($_GET['verification_id']))
	{
		$id = $_GET['verification_id'];


	    if(!isset($_SESSION['email']))
		{				
			echo "<script>window.open('u_login.php','_self')</script>";				
		}
		else
		{
			$verify = "update client_profile set verified = 'YES' where id like '$id'";
			$run_verify = mysqli_query($con, $verify);
			if(!$run_verify)
			{
				echo "Error: " . $verify . "<br>" . $con ->error;
				exit;
			}
			else
			{
				echo "<script>alert('$bus_name Registration approved')</script>";
				header("Location: index.php");
			}
    		
		
		}
		
	}
	else
	{
		echo "<script>alert('FILE ID UNKNOWN!...')</script>";
	}
?>




?>