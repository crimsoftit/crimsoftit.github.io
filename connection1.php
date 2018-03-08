<?php
    $con = mysqli_connect("localhost", "root", "", "admin");
	
    //check if connection to the database was estblished
	if(mysqli_connect_errno())
	{
	    echo "Failed to connect to the database: " . mysqli_connect_error();
	}
?>